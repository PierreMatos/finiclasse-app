<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BusinessStudy;


class BusinessStudysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('business_studies')->delete();

        BusinessStudy::factory()
        ->count(10)
        ->create();
    }
}
