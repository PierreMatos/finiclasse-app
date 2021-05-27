<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BenefitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('benefits')->delete();

        \DB::table('benefits')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Frota',
                'order' => 1,
                'color' => '#fffff',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Ap. Circular',
                'order' => 2,
                'color' => '#fffff',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Grande Frotista',
                'order' => 3,
                'color' => '#fffff',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
        ));
    }
}
