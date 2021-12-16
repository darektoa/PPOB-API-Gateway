<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class PersonalAccessToken extends SanctumPersonalAccessToken
{
    use HasFactory;

    protected $appends  = ['expired_at'];

    protected $guarded  = ['id'];


    public function tokenable() {
        return $this->morphTo();
    }


    public function getExpiredAtAttribute() {
        $expiration = config('sanctum.expiration');
        $createdAt  = $this->created_at;
        $expiredAt  = $createdAt->addMinutes($expiration);

        return $expiredAt;
    }
}
