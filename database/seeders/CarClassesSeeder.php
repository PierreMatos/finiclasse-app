<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('car_classes')->delete();

        \DB::table('car_classes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Classe 1',
                'order' => 1,
                'visible' => 1,
                'color' => '#fffff',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Classe 2',
                'order' => 2,
                'visible' => 1,
                'color' => '#fffff',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Classe 3',
                'order' => 3,
                'visible' => 1,
                'color' => '#fffff',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Classe 4',
                'order' => 4,
                'visible' => 1,
                'color' => '#fffff',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
           
        ));
    }
}
