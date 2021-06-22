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
        $this->call(ProposalStatesSeeder::class);
        $this->call(StandsSeeder::class);
        $this->call(MakesStatesSeeder::class);
        $this->call(CarConditionsSeeder::class);
        $this->call(CarCategoriesSeeder::class);
        $this->call(CarModelsSeeder::class);
        $this->call(CarsSeeder::class);
        $this->call(BusinessStudyAuthorizationsSeeder::class);
        $this->call(BenefitsSeeder::class);
        $this->call(BusinessStudysSeeder::class);
        $this->call(ProposalsSeeder::class);

    }
}
