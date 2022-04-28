<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MakesStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('makes')->delete();

        \DB::table('makes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Mercedes-Benz',
                'logo' => '1',
                'visible' => '1',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Seat',
                'logo' => '1',
                'visible' => '1',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Opel',
                'logo' => '1',
                'visible' => '1',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'BMW',
                'logo' => '1',
                'visible' => '1',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Audi',
                'logo' => '1',
                'visible' => '1',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Honda',
                'logo' => '1',
                'visible' => '1',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Citroen',
                'logo' => '1',
                'visible' => '1',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Fiat',
                'logo' => '1',
                'visible' => '1',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Ford',
                'logo' => '1',
                'visible' => '1',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Nissan',
                'logo' => '1',
                'visible' => '1',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Renault',
                'logo' => '1',
                'visible' => '1',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
           
        ));
    }
}
