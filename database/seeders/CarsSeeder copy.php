<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;


class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('cars')->delete();
        
        Car::factory()
        ->count(20)
        ->create();

        // factory(\App\Models\Car::class,15)->create();
    }
}
