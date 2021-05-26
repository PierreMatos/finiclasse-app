<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('car_states')->delete();

        \DB::table('car_states')->insert(array (
            
            0 => 
            array (
                'id' => 1,
                'name' => 'Encomendado',
                'order' => 1,
                'color' => '#fffff',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),  
            
            1 => 
            array (
                'id' => 2,
                'name' => 'Em Transito',
                'order' => 1,
                'color' => '#fffff',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),  

            2 => 
            array (
                'id' => 3,
                'name' => 'Disponivel',
                'order' => 1,
                'color' => '#fffff',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),  

            3 => 
            array (
                'id' => 4,
                'name' => 'Reservado',
                'order' => 1,
                'color' => '#fffff',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),  

        ));

    }
}
