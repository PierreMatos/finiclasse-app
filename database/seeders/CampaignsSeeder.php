<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campaign;


class CampaignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('campaigns')->delete();

        Campaign::factory()
        ->count(5)
        ->create();
    }
}
