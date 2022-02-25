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
        // \App\Models\User::factory(10)->create();
        $this->call(StandsSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(ClientTypeSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(PermissionsSeeder::class);
        
        $this->call(ProposalStatesSeeder::class);
        $this->call(MakesStatesSeeder::class);
        $this->call(CarConditionsSeeder::class);
        $this->call(CarCategoriesSeeder::class);
        $this->call(CarModelsSeeder::class);
        $this->call(CarStatesSeeder::class);
        $this->call(CarTransmissionsSeeder::class);
        $this->call(CarFuelsSeeder::class);
        $this->call(CarDrivesSeeder::class);
        $this->call(CarClassesSeeder::class);
        $this->call(CarsSeeder::class);
        $this->call(BusinessStudyAuthorizationsSeeder::class);
        $this->call(BenefitsSeeder::class);
        $this->call(BusinessStudysSeeder::class);
        $this->call(FinancingsSeeder::class);
        $this->call(ProposalStatesSeeder::class);
        $this->call(ProposalsSeeder::class);

    }
}
