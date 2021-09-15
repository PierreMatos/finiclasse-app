<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('car_models')->delete();

        \DB::table('car_models')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Ibiza',
                'make_id' => 2,
                'car_category_id' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'B',
                'make_id' => 1,
                'car_category_id' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'E',
                'make_id' => 1,
                'car_category_id' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'G',
                'make_id' => 1,
                'car_category_id' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'GLE',
                'make_id' => 1,
                'car_category_id' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'GLC',
                'make_id' => 1,
                'car_category_id' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'CLA',
                'make_id' => 1,
                'car_category_id' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'CLS',
                'make_id' => 1,
                'car_category_id' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'GLB',
                'make_id' => 1,
                'car_category_id' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'GLA',
                'make_id' => 1,
                'car_category_id' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'GLS',
                'make_id' => 1,
                'car_category_id' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            
            11 => 
            array (
                'id' => 12,
                'name' => 'A',
                'make_id' => 1,
                'car_category_id' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Leon',
                'make_id' => 2,
                'car_category_id' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'C',
                'make_id' => 2,
                'car_category_id' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
        ));
    }
}
