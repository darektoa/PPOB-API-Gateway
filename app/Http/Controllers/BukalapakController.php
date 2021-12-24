<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukalapakController extends Controller
{
    protected $BASE_URL;

    protected $request;

    protected $product;

    protected $providerProduct;
    

    public function __construct(Request $request, $product) {
        $this->BASE_URL         = env('BUKALAPAK_API_URL');
        $this->request          = $request;
        $this->product          = $product;
        $this->providerProduct  = $product
            ->providerProducts()
            ->whereRelation('provider', 'code', '=', 'BKLPK')
            ->first();
    }
}
