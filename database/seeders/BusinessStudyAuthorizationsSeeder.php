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
                'name' => 'Aceite > 7%',
                'min' => 7,
                'max' => 100,
                'responsible_id' => null,
                'color' => 'green',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Pendente < 7%',
                'min' => 6.9,
                'max' => 4,
                'responsible_id' => 2,
                'color' => 'yellow',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Pendente < 4%',
                'min' => 3.9,
                'max' => 0,
                'responsible_id' => 3,
                'color' => 'red',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Aceite pelo responsavél',
                'min' => null,
                'max' => null,
                'responsible_id' => null,
                'color' => 'green',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Rejeitado pelo responsavél',
                'min' => null,
                'max' => null,
                'responsible_id' => null,
                'color' => 'red',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Pendente margem em €',
                'min' => 0,
                'max' => 100,
                'responsible_id' => 3,
                'color' => 'red',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            )
           
        ));
    }
}
