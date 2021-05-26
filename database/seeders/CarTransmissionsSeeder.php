<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarTransmissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('car_transmissions')->delete();

        \DB::table('car_transmissions')->insert(array (

        0 => 
            array (
                'id' => 1,
                'name' => 'Automatico',
                'order' => 1,
                'visible' => 1,
                'color' => '#fffff',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
        1 => 
            array (
                'id' => 2,
                'name' => 'Manual',
                'order' => 2,
                'visible' => 1,
                'color' => '#fffff',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
        ));

    }
}
