<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BusinessStudyAuthorizationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('businenss_study_authorizations')->delete();

        \DB::table('businenss_study_authorizations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Aceite > 2%',
                'min' => 1,
                'max' => 2,
                'responsible_id' => 1,
                'color' => 'verde',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Pendente <2%',
                'min' => 2,
                'max' => 3,
                'responsible_id' => 2,
                'color' => 'amarelo',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Pendente <3%',
                'min' => 3,
                'max' => 4,
                'responsible_id' => 3,
                'color' => 'vermelho',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
        ));
    }
}
