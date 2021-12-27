<?php

namespace App\Http\Controllers;

use App\Exceptions\ErrorException;
use App\Helpers\{BukalapakHelper, ResponseHelper};
use App\Http\Resources\TransactionResource;
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
        try{
            $BASE_URL = $this->BASE_URL;
            $request  = $this->request;
            $product  = $this->product;
            $endpoint = "$BASE_URL/_partners/collecting-agents/phone-credit-prepaid/transactions";
    
            $response = Http::withHeaders([
                'Authorization' => BukalapakHelper::token()
            ])->post($endpoint, [
                'order_id'      => Str::uuid(),
                'phone_number'  => $request->account_number,
                'product_code'  => $this->providerProduct->code,
                'amount'        => $this->providerProduct->price,
            ]);
    
            $resData  = $response->object();

            if($response->serverError()) throw new ErrorException('Internal Server Error', [], 500);
            if($response->clientError()) throw new ErrorException('Bad Request', [], 400);
            if($response->failed()) throw new ErrorException('Bad Gateway', [], 502);
            
            return ResponseHelper::make(TransactionResource::make([
                'order_id'          => $request->order_id,
                'account_number'    => $request->account_number,
                'product_code'      => $product->code,
                'product_name'      => $product->name,
                'category'          => $product->category->name,
                'amount'            => $resData->data->amount,
            ]));
        }catch(ErrorException $err) {
            return ResponseHelper::error(
                $err->getErrors(),
                $err->getMessage(),
                $err->getCode()
            );
        }
    }    
}
