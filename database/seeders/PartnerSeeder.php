<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PartnerSeeder extends Seeder
{
    public function run()
    {
        $partner = Partner::create([
            'name'          => 'EXAMPLE',
            'api_key'       => 'uQEbfJq6OSW9yPweuc7QlNd5qY5yJJ5sWBI3VDs65gQa',
            'secret_key'    => Hash::make('Kbb4MdCyNIBNI6x07hZSYjlm69dEBh8yvkJNPQX8rtUx'),
        ]);

        $partner->tokens()->create([
            'name'      => 'auth_token',
            'abilities' => '[*]',
            'token'     => '09d3ad6a6554a8ed428e25a53fde4ac428790df8b3c4ddfa58c6ea17f94385fa'
        ]);
    }
}
