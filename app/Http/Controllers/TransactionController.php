<?php

namespace App\Http\Controllers;

use App\Exceptions\ErrorException;
use App\Helpers\ResponseHelper;
use App\Models\{Product, Transaction};
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request) {
        try{
            $productCode  = $request->product_code;
            $product      = Product::with('category.setting.provider')->where('code', '=', $productCode)->first();
            $category     = $product->category;
            $providerCode = $category->setting->provider->code;
            $controller   = null;

            if($providerCode === 'BKLPK')
                $controller = new BukalapakController($request, $product);

            return $controller->run();
        }catch(ErrorException $err) {
            return ResponseHelper::error(
                $err->getErrors(),
                $err->getMessage(),
                $err->getCode(),
            );
        }
    }
}
