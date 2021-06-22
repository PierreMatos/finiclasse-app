<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proposal;


class ProposalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('proposals')->delete();

        Proposal::factory()
        ->count(10)
        ->create();
    }
}
