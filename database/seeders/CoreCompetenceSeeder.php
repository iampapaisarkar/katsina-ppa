<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CoreCompetence;

class CoreCompetenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $CoreCompetence = [
            [
            'title' => 'GOODS (Suppliers)',
            'code' => 'A',
            ],
            [
            'title' => 'WORKS (Contractors)',
            'code' => 'B',
            ],
            [
            'title' => 'SERVICES (Consulting & Non-Consulting)',
            'code' => 'C',
            ],
        ];
        CoreCompetence::insert($CoreCompetence);
    }
}
