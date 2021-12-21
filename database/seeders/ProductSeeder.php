<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [1, 'PDAM AETRA', 'PDAM-AETRA'],
            [2, 'Telkomsel Pulsa 10.000', 'PLS-TSEL-10K'],
            [2, 'Indoosat Pulsa 10.000', 'PLS-IDST-10K'],
            [2, 'Smartfren Pulsa 10.000', 'PLS-SFRN-10K'],
            [2, 'Tri Pulsa 10.000', 'PLS-TRI-10K'],
            [2, 'XL Pulsa Pulsa 10.000', 'PLS-XL-10K'],
            [3, 'PLN Postpaid', 'PLN-POST'],
            [3, 'PLN Token 20.000', 'PLN-PRE-1'],
            [4, 'Iternet Combo 10GB/30Hari', 'PD-TSEL-1'],
            [4, 'Freedom Internet 5GB/3Hari', 'PD-IDST-1'],
            [4, 'Freedom Internet 10GB/3Hari + Bonus 1GB', 'PD-IDST-2'],
            [4, 'Unlimited 60.000/3Hari', 'PD-SFRN-1'],
            [5, '170 Diamonds', 'VG-ML-1'],
            [5, '250 Diamonds', 'VG-ML-2'],
            [5, '100 Diamonds', 'VG-FF-1'],
            [5, '520 Diamonds', 'VG-FF-2'],
        ];


        foreach($products as $product) {
            Product::create([
                'product_category_id'   => $product[0],
                'name'                  => $product[1],
                'code'                  => $product[2],
            ]);
        }
    }
}
