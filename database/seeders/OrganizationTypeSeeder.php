<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrganizationType;

class OrganizationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $OrganizationType = [
            [
            'title' => 'Incorporated Company',
            'code' => 'A',
            ],
            [
            'title' => 'Limited Partnerships',
            'code' => 'B',
            ],
            [
            'title' => 'Business Name',
            'code' => 'C',
            ],
        ];
        OrganizationType::insert($OrganizationType);
    }
}
