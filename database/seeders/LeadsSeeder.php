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
                'name' => 'Mercedes-Benz',
                'logo' => '1',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),

    }
}
