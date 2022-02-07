<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mda;

class MdaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Mda = [
            [
            'title' => 'Ministry of Health',
            'type' => 'Ministry',
            ],
            [
            'title' => 'Ministry of Education',
            'type' => 'Ministry',
            ],
            [
            'title' => 'Ministry of Works & Housing',
            'type' => 'Ministry',
            ]
        ];
        Mda::insert($Mda);
    }
}
