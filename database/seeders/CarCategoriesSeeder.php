<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('car_categories')->delete();

        \DB::table('car_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Ligeiro',
                'order' => 1,
                'color' => '#fffff',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'SUV',
                'order' => 2,
                'color' => '#fffff',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Comercial',
                'order' => 3,
                'color' => '#fffff',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
           
        ));
    }
}
