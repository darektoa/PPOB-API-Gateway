<?php

namespace App\Http\Controllers;

use App\Exceptions\ErrorException;
use App\Models\Partner;
use App\Helpers\ResponseHelper;
use App\Http\Resources\TokenResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash, Validator};

class PartnerController extends Controller
{
    public function token(Request $request) {
        try{
            $validator  = Validator::make($request->all(), [
                'api_key'       => 'required',
                'secret_key'    => 'required'
            ]);

            if($validator->fails()){
                $errors = $validator->errors()->all();
                throw new ErrorException('Unprocessable', $errors, 422);
            }

            $apiKey     = $request->api_key;
            $secretKey  = $request->secret_key;
            $partner    = Partner::where('api_key', '=', $apiKey)->first();
            
            if(!$partner)
                throw new ErrorException('Unprocessable', ["Api key doesn't exist"], 422);
            if(!Hash::check($secretKey, $partner->secret_key))
                throw new ErrorException('Unprocessable', ["Credential doesn't match"], 422);

            $token = $partner->createToken('partner_token');
            $token->accessToken->plainTextToken = $token->plainTextToken;
            $token = $token->accessToken;

            return ResponseHelper::make(TokenResource::make($token));
        }catch(ErrorException $err) {
            return ResponseHelper::error(
                $err->getErrors(),
                $err->getMessage(),
                $err->getCode(),
            );
        }
    }
}
