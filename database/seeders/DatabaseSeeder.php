<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PartnerSeeder::class,
            ProductProviderSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            ProviderProductSeeder::class,
        ]);
    }
}
