<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UserSeeder::class]);
        $this->call([RoleSeeder::class]);
        $this->call([UserRoleSeeder::class]);

        $this->call([CoreCompetenceSeeder::class]);
        $this->call([OrganizationTypeSeeder::class]);
        $this->call([RegistrationCategorySeeder::class]);
        $this->call([ServiceSeeder::class]);
        $this->call([ServiceTypeSeeder::class]);
        $this->call([StateSeeder::class]);
        $this->call([CountrySeeder::class]);
        $this->call([MdaTypeSeeder::class]);
        $this->call([MdaSeeder::class]);
        $this->call([AdditionalFeeSeeder::class]);

        $this->call([ProcessTypeSeeder::class]);
        $this->call([ProcurementTyeSeeder::class]);
        $this->call([ProcurementMethodSeeder::class]);

    }
}
