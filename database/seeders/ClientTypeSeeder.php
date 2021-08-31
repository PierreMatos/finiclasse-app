<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('client_types')->delete();

        \DB::table('client_types')->insert(array (

        0 => 
            array (
                'id' => 1,
                'name' => 'Particular',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
        1 => 
            array (
                'id' => 2,
                'name' => 'Empresa',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
        2 => 
            array (
                'id' => 3,
                'name' => 'Frotista',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
        3 => 
            array (
                'id' => 4,
                'name' => 'Grande Frotista',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
        4 => 
            array (
                'id' => 5,
                'name' => 'ENI',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
        ));
    }
}
