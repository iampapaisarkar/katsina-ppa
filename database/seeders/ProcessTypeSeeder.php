<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProcessType;

class ProcessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ProcessTypes = [
            [
            'type' => 'Procurement',
            ],
            [
            'type' => 'Disposal',
            ],
            [
            'type' => 'Prequalification',
            ]
        ];

        ProcessType::insert($ProcessTypes);
    }
}
