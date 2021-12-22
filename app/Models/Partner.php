<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Partner extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $guarded  = ['id'];


    public function users() {
        return $this->hasMany(User::class);
    }


    public function tokens() {
        return $this->morphMany(PersonalAccessToken::class, 'tokenable');
    }

    
    public function IpWhitelist() {
        return $this->hasMany(IpWhitelist::class);
    }


    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
