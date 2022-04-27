<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;


class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('cars')->delete();

  

        // factory(\App\Models\Car::class,15)->create();

        // \DB::table('car_states')->delete();

        \DB::table('cars')->insert(array (
            
            0 => 
            array (
                'id' => 1,
                'model_id' => '1', //Ibiza
                'variant' => 'Style Plus',
                'motorization' => '1000',
                'category_id' => '1', //Ligiero
                'registration' => '2019',
                'condition_id' => '2', //Usado
                'state_id' => '3', //Disponivel  !5Vendido 
                'warranty_stand' => '12', //meses
                'warranty_make' => '2023/04',
                'plate' => '87-XL-41',
                'stand_id' => '1',
                'price' => '30000',
                'price_campaign' => '40000',
                'tradein' => '0', //
                'deductible' => '0',
                'power' => '80',
                'km' => '25479',
                'transmission_id' => '2', //Manual
                // 'color_interior' => '',
                'color_exterior' => 'Preto',
                'metallic_color' => '1', //boolean
                'drive_id' => '2', //Tração dianteira
                'fuel_id' => '1', //Gasolina
                'door' => '5',
                'seats' => '5',
                'class_id' => '1',
                'iva' => '5555',
                'consumption' => null,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            
            1 => 
            array (
                'id' => 2,
                'model_id' => '13', //Leon
                'variant' => 'Style Plus',
                'motorization' => '1600',
                'category_id' => '1', //Ligiero
                'registration' => '2018',
                'condition_id' => '2', //Usado
                'state_id' => '3', //Disponivel 
                'warranty_stand' => '12', //meses
                'warranty_make' => '2023/04',
                'plate' => '87-XL-41',
                'stand_id' => '1',
                'price' => '22500',
                'price_new' => '31000',
                'tradein' => '0', //Não aceita retoma
                'deductible' => '0',
                'power' => '115',
                'km' => '25479',
                'transmission_id' => '2', //Manual
                // 'color_interior' => '',
                'color_exterior' => 'Preto',
                'metallic_color' => '1', //boolean
                'drive_id' => '2', //Tração dianteira
                'fuel_id' => '1', //Gasolina
                'door' => '5',
                'seats' => '5',
                'class_id' => '1',
                'iva' => '5555',
                'consumption' => null,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            

            2 => 
            array (
                'id' => 3,
                'model_id' => '6', //GLC
                'variant' => '300 4MATIC',
                'motorization' => '2000',
                'category_id' => '2', //Ligiero
                'registration' => '2021',
                'condition_id' => '1', //Novo
                'state_id' => '3', //Disponivel 
                'warranty_stand' => '12', //meses
                'warranty_make' => '2023/04',
                'plate' => '',
                'stand_id' => '1',
                'price' => '65000',
                'price_new' => '70000',
                'tradein' => '0', //Não aceita retoma
                'deductible' => '0',
                'power' => '194',
                'km' => '0',
                'transmission_id' => '1', //Automatico
                // 'color_interior' => '',
                'color_exterior' => 'Preto',
                'metallic_color' => '1', //boolean
                'drive_id' => '4', //4MATIC
                'fuel_id' => '3', //Híbrido
                'door' => '5',
                'seats' => '5',
                'class_id' => '1',
                'iva' => '5555',
                'consumption' => null,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            
            2 => 
            array (
                'id' => 3,
                'model_id' => '6', //GLC
                'variant' => '300 4MATIC',
                'motorization' => '2000',
                'category_id' => '2', //Ligiero
                'registration' => '2021',
                'condition_id' => '1', //Novo
                'state_id' => '3', //Disponivel 
                'warranty_stand' => '12', //meses
                'warranty_make' => '2023/04',
                'plate' => '',
                'stand_id' => '1',
                'price' => '63000',
                'price_new' => '67000',
                'tradein' => '0', //Não aceita retoma
                'deductible' => '0',
                'power' => '194',
                'km' => '0',
                'transmission_id' => '1', //Automatico
                // 'color_interior' => '',
                'color_exterior' => 'Preto',
                'metallic_color' => '1', //boolean
                'drive_id' => '4', //4MATIC
                'fuel_id' => '3', //Híbrido
                'door' => '5',
                'seats' => '5',
                'class_id' => '1',
                'iva' => '5555',
                'consumption' => null,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            
            // MAKE MEDIA SEEDER

        ));

        // Car::factory()
        // ->count(10)
        // ->create();
    }
}
