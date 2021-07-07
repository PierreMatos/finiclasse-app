<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Financing;


class FinancingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('financings')->delete();

        Financing::factory()
        ->count(5)
        ->create();
    }
}
