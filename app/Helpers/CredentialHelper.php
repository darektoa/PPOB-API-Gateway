<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class CredentialHelper{
    static public function make() {
        $code   = random_bytes(32);
        $code   = base64_encode($code);
        $code   = Str::replace('=', Str::random(1), $code);
        $code   = Str::replace('/', Str::random(1), $code);

        return $code;
    }
}