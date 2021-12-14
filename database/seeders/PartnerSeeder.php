<?php

namespace Database\Seeders;

use App\Helpers\CredentialHelper;
use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run()
    {
        Partner::create([
            'name'          => 'EXAMPLE',
            'api_key'       => CredentialHelper::make(),
            'secret_key'    => CredentialHelper::make(),
        ]);
    }
}
