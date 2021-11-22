<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class BukalapakHelper{
  static public function token() {
    $BASE_URL = env('BUKALAPAK_BASE_URL');
    $endpoint = "$BASE_URL/oauth/token";
    $response = Http::post($endpoint, [
      'grant_type'    => 'client_credentials',
      'client_id'     => env('BUKALAPAK_CLIENT_ID'),
      'client_secret' => env('BUKALAPAK_CLIENT_SECRET'),
      'scope'         => 'public',
    ]);
    dd($response);
    return $response->body();
  }
}