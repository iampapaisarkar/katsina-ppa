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
            'amount' => 20000000,
            ],
            [
            'title' => 'Department',
            'amount' => 10000000,
            ],
            [
            'title' => 'Agency',
            'amount' => 10000000,
            ],
        ];
        MdaType::insert($MdaType);
    }
}
