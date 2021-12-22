<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['PDAM', 'pdam'],
            ['Pulsa', 'phone-credit'],
            ['Listrik', 'electricity'],
            ['Paket Data', 'data-plan'],
            ['Voucher Game', 'game-voucher'],
        ];


        foreach($categories as $category) {
            $category = ProductCategory::create([
                'name'  => $category[0],
                'code'  => $category[1],
            ]);

            $category->setting()->create([
                'product_provider_id'  => 1,
            ]);
        }
    }
}
