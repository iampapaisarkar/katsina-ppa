<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
            'first_name' => 'Vendor',
            'sur_name' => 'User',
            'email' => 'vendor@test.com',
            'phone_number' => '9002094533',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'mda' => null,
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
            'first_name' => 'PPA',
            'sur_name' => 'User',
            'email' => 'ppa@test.com',
            'phone_number' => '9002094533',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'mda' => null,
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
            'first_name' => 'MDA',
            'sur_name' => 'Head',
            'email' => 'mdahead@test.com',
            'phone_number' => '9002094533',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'mda' => 1,
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
            'first_name' => 'MDA',
            'sur_name' => 'Member',
            'email' => 'mdamember@test.com',
            'phone_number' => '9002094533',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'mda' => 2,
            'created_at' => now(),
            'updated_at' => now()
            ],
            [
            'first_name' => 'MDA',
            'sur_name' => 'Ministry',
            'email' => 'mdaministry@test.com',
            'phone_number' => '9002094533',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'mda' => 3,
            'created_at' => now(),
            'updated_at' => now()
            ]
        ];
        User::insert($users);
    }
}
