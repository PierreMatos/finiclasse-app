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
                'description' => 'Viatura encontra-se inserida numa proposta e foi feita a encomendada ao fornecedor',
                'order' => 1,
                'color' => '#fffff',
                'visible' => 0,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),  
            
            1 => 
            array (
                'id' => 2,
                'name' => 'Em Trânsito',
                'description' => 'A encomenda para esta viatura já foi processada pelo fornecedor e encontra-se neste momento a caminho do concessionário',
                'order' => 1,
                'color' => '#fffff',
                'visible' => 0,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),  

            2 => 
            array (
                'id' => 3,
                'name' => 'Disponivel',
                'description' => 'Viatura encontra-se disponível para venda',
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
                'description' => 'Esta viatura encontra-se reservada e não pode ser vendida',
                'order' => 1,
                'color' => '#fffff',
                'visible' => 0,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),

            4 => 
            array (
                'id' => 5,
                'name' => 'POS',
                'description' => 'Esta viatura é uma simulação para propôr ao cliente',
                'order' => 1,
                'color' => '#fffff',
                'visible' => 0,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),  

        ));

    }
}
