<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RegistrationCategory;

class RegistrationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $RegistrationCategory = [
            [
            'code' => 'A',
            'title' => 'Contract Value N250,000 and below',
            'contract_value' => 250000,
            'registration_fee' => 15000,
            'renewal_fee' => 10000,
            ],
            [
            'code' => 'B',
            'title' => 'Contract Value N250,001 and N1m',
            'contract_value' => 1000000,
            'registration_fee' => 15000,
            'renewal_fee' => 10000,
            ],
            [
            'code' => 'C',
            'title' => 'Contract Value N1m and N2.5m',
            'contract_value' => 2500000,
            'registration_fee' => 15000,
            'renewal_fee' => 10000,
            ],
            [
            'code' => 'D',
            'title' => 'Contract Value N2.5 and N50m',
            'contract_value' => 50000000,
            'registration_fee' => 15000,
            'renewal_fee' => 10000,
            ],
            [
            'code' => 'E',
            'title' => 'Contract Value N50m and N500m',
            'contract_value' => 500000000,
            'registration_fee' => 15000,
            'renewal_fee' => 10000,
            ],
            [
            'code' => 'F',
            'title' => 'Contract Value N500m and Above',
            'contract_value' => 0,
            'registration_fee' => 15000,
            'renewal_fee' => 10000,
            ]
        ];
        RegistrationCategory::insert($RegistrationCategory);
    }
}
