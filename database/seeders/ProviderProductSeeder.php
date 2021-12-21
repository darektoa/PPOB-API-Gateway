<?php

namespace Database\Seeders;

use App\Models\ProviderProduct;
use Illuminate\Database\Seeder;

class ProviderProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [1, 1, 'PDAM Aetra', 'PDAM-Aetra'],
            [2, 1, 'Telkomsel Pulsa 10.000', 'pulsa-tsel-10000', 11500],
            [7, 1, 'Listrik Pascabayar', 'listrik-pascabayar'],
            [8, 1, 'Token Listrik 20.000', 'token-listrik-20000', 20000],
            [10, 1, 'Paket Data 20.000', 'paket-data-20000', 20000],
            [14, 1, '250 Diamonds', 'ML10', 20000],
        ];


        foreach($products as $product) {
            ProviderProduct::create([
                'product_id'            => $product[0],
                'product_provider_id'   => $product[1],
                'name'                  => $product[2],
                'code'                  => $product[3],
                'price'                 => $product[4] ?? null,
            ]);
        }
    }
}
