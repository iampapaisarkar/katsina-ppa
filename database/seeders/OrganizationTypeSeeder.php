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
            ],
            [
            'title' => 'Limited Partnerships',
            ],
            [
            'title' => 'Business Name',
            ],
        ];
        OrganizationType::insert($OrganizationType);
    }
}
