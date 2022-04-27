<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('stands')->delete();

        \DB::table('stands')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Finiclasse Guarda',
                'localization' => 'Guarda',
                'phone' => '222354687',
                'email' => 'geral@finiclasse.com',
                'order' => 1,
                'color' => '#fffff',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Finiclasse Viseu',
                'localization' => 'Viseu',
                'phone' => '233354699',
                'email' => 'geral@finiclasse.com',
                'order' => 2,
                'color' => '#fffff',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Seat Guarda',
                'localization' => 'Guarda',
                'phone' => '271093031',
                'email' => 'seat@finiclasse.com',
                'order' => 3,
                'color' => '#fffff',
                'visible' => 1,
                'created_at' => '2019-10-23 15:50:48',
                'updated_at' => '2019-10-23 15:50:48',
            ),
        ));

    }
}
