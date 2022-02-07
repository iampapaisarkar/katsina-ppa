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
            'title' => 'Contract Value N500,000 and below',
            'contract_value' => 500000,
            'registration_fee' => 500000,
            'renewal_fee' => 0,
            ],
            [
            'code' => 'B',
            'title' => 'Contract Value N500,001  - N5M',
            'contract_value' => 500000,
            'registration_fee' => 5000001,
            'renewal_fee' => 5000000,
            ],
            [
            'code' => 'C',
            'title' => 'Contract Value Above N5M - N10M',
            'contract_value' => 500000,
            'registration_fee' => 5000001,
            'renewal_fee' => 5000000,
            ],
            [
            'code' => 'D',
            'title' => 'Contract Value Above N10M - N100M',
            'contract_value' => 500000,
            'registration_fee' => 5000001,
            'renewal_fee' => 5000000,
            ],
            [
            'code' => 'E',
            'title' => 'Contract Value Above N100M - N250M',
            'contract_value' => 500000,
            'registration_fee' => 5000001,
            'renewal_fee' => 5000000,
            ],
            [
            'code' => 'F',
            'title' => 'Contract Value Above N250M - N1B',
            'contract_value' => 500000,
            'registration_fee' => 5000001,
            'renewal_fee' => 5000000,
            ],
            [
            'code' => 'G',
            'title' => 'Contract Value Above N1B to N5B',
            'contract_value' => 500000,
            'registration_fee' => 5000001,
            'renewal_fee' => 5000000,
            ],
            [
            'code' => 'H',
            'title' => 'Contract Value Above N5B - N10B',
            'contract_value' => 500000,
            'registration_fee' => 5000001,
            'renewal_fee' => 5000000,
            ],
            [
            'code' => 'I',
            'title' => 'Contract Value Above N10B - N20B',
            'contract_value' => 500000,
            'registration_fee' => 5000001,
            'renewal_fee' => 5000000,
            ],
            [
            'code' => 'J',
            'title' => 'Contract Value Above N20B',
            'contract_value' => 500000,
            'registration_fee' => 5000001,
            'renewal_fee' => 5000000,
            ]
        ];
        RegistrationCategory::insert($RegistrationCategory);
    }
}
