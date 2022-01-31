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
            'class' => 'A',
            'contract_value' => 'Contract Value N500,000 and below',
            'registration_fee' => 500000,
            'renewal_fee' => 0,
            ],
            [
            'class' => 'B',
            'contract_value' => 'Contract Value N500,001  - N5M',
            'registration_fee' => 5000001,
            'renewal_fee' => 5000000,
            ],
            [
            'class' => 'C',
            'contract_value' => 'Contract Value Above N5M - N10M',
            'registration_fee' => 5000001,
            'renewal_fee' => 5000000,
            ],
            [
            'class' => 'D',
            'contract_value' => 'Contract Value Above N10M - N100M',
            'registration_fee' => 5000001,
            'renewal_fee' => 5000000,
            ],
            [
            'class' => 'E',
            'contract_value' => 'Contract Value Above N100M - N250M',
            'registration_fee' => 5000001,
            'renewal_fee' => 5000000,
            ],
            [
            'class' => 'F',
            'contract_value' => 'Contract Value Above N250M - N1B',
            'registration_fee' => 5000001,
            'renewal_fee' => 5000000,
            ],
            [
            'class' => 'G',
            'contract_value' => 'Contract Value Above N1B to N5B',
            'registration_fee' => 5000001,
            'renewal_fee' => 5000000,
            ],
            [
            'class' => 'H',
            'contract_value' => 'Contract Value Above N5B - N10B',
            'registration_fee' => 5000001,
            'renewal_fee' => 5000000,
            ],
            [
            'class' => 'I',
            'contract_value' => 'Contract Value Above N10B - N20B',
            'registration_fee' => 5000001,
            'renewal_fee' => 5000000,
            ],
            [
            'class' => 'J',
            'contract_value' => 'Contract Value Above N20B',
            'registration_fee' => 5000001,
            'renewal_fee' => 5000000,
            ]
        ];
        RegistrationCategory::insert($RegistrationCategory);
    }
}
