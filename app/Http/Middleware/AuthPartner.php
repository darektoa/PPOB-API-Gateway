<?php

namespace App\Http\Middleware;

use App\Helpers\ResponseHelper;
use App\Models\PersonalAccessToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthPartner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        $authorization  = $request->header('Authorization');
        $authorization  = explode(' ', $authorization, 2);
        $type           = $authorization[0];
        $token          = $authorization[1] ?? null;
        $token          = $token ? PersonalAccessToken::findToken($token) : null;
        $partner        = $token ? $token->tokenable : null;

        // TOKEN & HEADER VALIDATION
        if(!$request->hasHeader('Authorization'))
            return ResponseHelper::error(['Missing "Authorization" header request'], 'Unauthorized', 401);
        if($type !== 'Bearer')
            return ResponseHelper::error(['Invalid authorization type'], 'Unauthorized', 401);
        if(!$partner)
            return ResponseHelper::error(['Invalid authorization token'], 'Unauthorized', 401);
        if($token->created_at->diffInMinutes(now()) >= config('sanctum.expiration'))
            return ResponseHelper::error(['Token expired'], 'Unauthorized', 401);

        Auth::guard('partner')->login($partner);
        return $next($request);
    }
}
