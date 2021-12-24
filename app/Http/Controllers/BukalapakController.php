<?php

namespace App\Http\Controllers;

use App\Exceptions\ErrorException;
use App\Helpers\{BukalapakHelper, ResponseHelper};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

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
    

    public function run() {
        $category = $this->product->category->code;

        if($category === 'phone-credit')
            return $this->phoneCredit();
    }


    protected function phoneCredit() {
        $BASE_URL = $this->BASE_URL;
        $request  = $this->request;
        $product  = $this->providerProduct;
        $endpoint = "$BASE_URL/_partners/collecting-agents/phone-credit-prepaid/transactions";

        $response = Http::withHeaders([
            'Authorization' => BukalapakHelper::token()
        ])->post($endpoint, [
            'order_id'      => Str::uuid(),
            'phone_number'  => $request->account_number,
            'product_code'  => $product->code,
            'amount'        => $product->price,
        ]);

        return ResponseHelper::make($response->json());
    }    
}
