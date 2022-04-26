<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LeadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('leads_users')->delete();

        \DB::table('leads_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'client_id' => '20',
                'vendor_id' => '14',
                'created_at' => '2022-04-15 17:00:01',
                'updated_at' => '2022-04-25 17:00:01',
            ),
        ));
    }
}