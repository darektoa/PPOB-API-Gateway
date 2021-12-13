<?php

namespace App\Helpers;

class RandomCodeHelper{
    static public function make($length=40) {
        $code   = random_bytes($length/2);
        $code   = bin2hex($code);
        
        return $code;
    }
}