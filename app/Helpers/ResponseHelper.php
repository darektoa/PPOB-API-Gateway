<?php

namespace App\Helpers;

use Illuminate\Http\Resources\Json\JsonResource;

class ResponseHelper {
    static public function make($data=[], string $message='OK', $status=200) {
        return response()->json([
            'status'  => $status,
            'message' => $message,
            'data'    => $data,
        ], $status);
    }
}