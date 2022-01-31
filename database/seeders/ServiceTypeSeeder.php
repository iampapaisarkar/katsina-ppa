<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceType;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ServiceType = [
            [
            'title' => 'Communication Services',
            ],
            [
            'title' => 'Consultancy and Professional Services',
            ],
            [
            'title' => 'Facilities Rental',
            ],
            [
            'title' => 'Financial Services',
            ],
            [
            'title' => 'Maintenance Services',
            ],
            [
            'title' => 'Media and Communication Services',
            ],
            [
            'title' => 'Security Services',
            ],
            [
            'title' => 'Travel and Hospitality Services',
            ],
            [
            'title' => 'Utilities',
            ]
        ];
        ServiceType::insert($ServiceType);
    }
}
