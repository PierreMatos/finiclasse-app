<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarDrivesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('car_drives')->delete();

        \DB::table('car_drives')->insert(array (

        0 => 
            array (
                'id' => 1,
                'name' => 'Tração traseira',
                'order' => 1,
                'visible' => 1,
                'color' => '#fffff',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
        1 => 
            array (
                'id' => 2,
                'name' => 'Tração frontal',
                'order' => 2,
                'color' => '#fffff',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),

        2 => 
            array (
                'id' => 3,
                'name' => 'Tração 4x4',
                'order' => 2,
                'color' => '#fffff',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),

        3 => 
            array (
                'id' => 4,
                'name' => '4Matic',
                'order' => 2,
                'color' => '#fffff',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            
        ));
    }
}
