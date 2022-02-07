<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdditionalFee;

class AdditionalFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $AdditionalFee = [
            [
            'description' => 'Vendor Application Fee	',
            'registration_fee' => 1000,
            'renewal_fee' => 0,
            ]
        ];
        AdditionalFee::insert($AdditionalFee);
    }
}
