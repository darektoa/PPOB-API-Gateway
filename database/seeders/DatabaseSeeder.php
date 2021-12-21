<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PartnerSeeder::class,
            ProductCategorySeeder::class,
            ProductProviderSeeder::class,
            ProductSeeder::class,
            ProviderProductSeeder::class,
        ]);
    }
}
