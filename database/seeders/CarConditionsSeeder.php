<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarConditionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('car_conditions')->delete();

        \DB::table('car_conditions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Novo',
                'order' => 1,
                'visible' => 1,
                'color' => '#fffff',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Usado',
                'order' => 2,
                'visible' => 1,
                'color' => '#fffff',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Semi-novo',
                'order' => 4,
                'visible' => 1,
                'color' => '#fffff',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
           
        ));
    }
}
