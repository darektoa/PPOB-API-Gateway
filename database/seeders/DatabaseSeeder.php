<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PartnerSeeder::class,
            ProductCategorySeeder::class,
        ]);
    }
}
