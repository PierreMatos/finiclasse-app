<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProposalStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('proposal_states')->delete();

        \DB::table('proposal_states')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Aberto',
                'order' => 1,
                'color' => '#c4e7cc',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Fechado',
                'order' => 2,
                'color' => '#f6c8cc',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Pendente',
                'order' => 3,
                'color' => '#ffeebb',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Perdido',
                'order' => 4,
                'color' => '#6c757d',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Partilhado',
                'order' => 4,
                'color' => '#fffff',
                'visible' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
        ));
    }
}
