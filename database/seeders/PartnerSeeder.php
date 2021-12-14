<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run()
    {
        Partner::create([
            'name'      => 'INDOHP',
            'api_key'   => ''
        ]);
    }
}
