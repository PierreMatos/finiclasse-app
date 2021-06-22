<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarFuelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('car_fuels')->delete();

        \DB::table('car_fuels')->insert(array (

        0 => 
            array (
                'id' => 1,
                'name' => 'Gasolina',
                'order' => 1,
                'visible' => 1,
                'color' => '#fffff',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
        1 => 
            array (
                'id' => 2,
                'name' => 'Diesel',
                'order' => 2,
                'visible' => 1,
                'color' => '#fffff',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
        2 => 
            array (
                'id' => 3,
                'name' => 'Elétrico',
                'order' => 2,
                'visible' => 1,
                'color' => '#fffff',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
        ));
    }
}
