<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProcurementTye;

class ProcurementTyeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ProcurementTyes = [
            [
            'type' => 'Supplies',
            ],
            [
            'type' => 'Works',
            ],
            [
            'type' => 'Non Consultancy Services',
            ],
            [
            'type' => 'Consultancy Services',
            ]
        ];

        ProcurementTye::insert($ProcurementTyes);
    }
}
