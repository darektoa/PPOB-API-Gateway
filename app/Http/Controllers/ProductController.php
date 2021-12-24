<?php

namespace App\Http\Controllers;

use App\Exceptions\ErrorException;
use App\Helpers\ResponseHelper;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::paginate(10);

        return ResponseHelper::paginate($products);
    }


    public function show(Product $product) {
        try{
            return ResponseHelper::make($product);
        }catch(ErrorException $err) {
            return ResponseHelper::error(
                $err->getErrors(),
                $err->getMessage(),
                $err->getCode(),
            );
        }
    }
}
