<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
            'role' => 'Vendor',
            'code' => 'vendor',
            ],
            [
            'role' => 'PPA',
            'code' => 'ppa',
            ],
            [
            'role' => 'Head',
            'code' => 'mda_head',
            ],
            [
            'role' => 'Member',
            'code' => 'mda_member',
            ]
        ];

        Role::insert($roles);
    }
}
