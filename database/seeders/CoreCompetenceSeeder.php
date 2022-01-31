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
            ],
            [
            'title' => 'WORKS (Contractors)',
            ],
            [
            'title' => 'SERVICES (Consulting & Non-Consulting)',
            ],
        ];
        CoreCompetence::insert($CoreCompetence);
    }
}
