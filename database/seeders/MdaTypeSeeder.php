<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MdaType;

class MdaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $MdaType = [
            [
            'title' => 'Ministry',
            'amount' => 2000000,
            ],
            [
            'title' => 'Department',
            'amount' => 1000000,
            ],
            [
            'title' => 'Agency',
            'amount' => 1000000,
            ],
        ];
        MdaType::insert($MdaType);
    }
}
