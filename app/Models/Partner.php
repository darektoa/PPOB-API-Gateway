<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Authenticatable
{
    use HasFactory;

    protected $guarded  = ['id'];


    public function users() {
        return $this->hasMany(User::class);
    }


    public function tokens() {
        return $this->morphMany(PersonalAccessToken::class, 'tokenable');
    }
}
