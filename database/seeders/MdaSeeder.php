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
            'type' => 1,
            'has_head' => true,
            ],
            [
            'title' => 'Ministry of Education',
            'type' => 1,
            'has_head' => true,
            ],
            [
            'title' => 'Ministry of Works & Housing',
            'type' => 1,
            'has_head' => false,
            ]
        ];
        Mda::insert($Mda);
    }
}
