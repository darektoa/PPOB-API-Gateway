<?php

namespace Database\Seeders;

use App\Models\ProductProvider;
use Illuminate\Database\Seeder;

class ProductProviderSeeder extends Seeder
{
    public function run()
    {
        $providers  = [
            ['Bukalapak', 'BKLPK'],
            ['Tokopedia', 'TKPDA']
        ];


        foreach($providers as $provider) {
            ProductProvider::create([
                'name'  => $provider[0],
                'code'  => $provider[1],
            ]);
        }
    }
}
