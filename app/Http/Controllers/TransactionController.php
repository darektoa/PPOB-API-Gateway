<?php

namespace App\Http\Controllers;

use App\Exceptions\ErrorException;
use App\Helpers\ResponseHelper;
use App\Models\{Product, Transaction};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function store(Request $request) {
        try{
            $validator = Validator::make($request->all(), [
                'order_id'        => 'required|alpha_dash',
                'product_code'    => 'required|exists:products,code',
                'account_number'  => 'required|string',
                'amount'          => 'nullable|numeric'
            ]);
            
            if($validator->fails()) {
                $errors = $validator->errors()->all();
                throw new ErrorException('Unprocessable', $errors, 422);
            }

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
