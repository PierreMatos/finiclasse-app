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

        // Car::factory()
        // ->count(10)
        // ->create();

        // factory(\App\Models\Car::class,15)->create();

        // \DB::table('car_states')->delete();

        \DB::table('cars')->insert(array (
            
            0 => 
            array (
                // 'id' => 1,
                'model_id' => '1', //Ibiza
                'variant' => 'Style Plus',
                'motorization' => 1000,
                'category_id' => '1', //Ligiero
                'registration' => 2019,
                'condition_id' => 2, //Usado
                'state_id' => 3, //Disponivel 
                //'komm' => '';
                'warranty_stand' => 12, //meses
                'warranty_make' => '2023/04',
                'plate' => '87-XL-41',
                'stand_id' => 1,
                'price' => '1887000'                ,
                // 'price_base' => '', carro antes dos extras
                //'price_new' => '',
                'price_campaign' => '13750',
                'tradein' => 0, //
                // 'tradein_purchase' => '',
                'tradein_sale' => '',
                // 'flexible' => '0',
                'deductible' => '0',
                'power' => 80,
                'km' => 25479,
                'transmission_id' => 2, //Manual
                // 'color_interior' => '',
                'color_exterior' => 'Preto',
                'metallic_color' => 1, //boolean
                'drive_id' => 2, //Tração dianteira
                'fuel_id' => 1, //Gasolina
                'door' => 5,
                'seats' => 5,
                'class_id' => 1,
                'autonomy' => '',
                'emissions' => '',
                'iuc' => '',
                'registration_count' => '',
                // 'order_date' => '',
                // 'arrival_date' => '',
                // 'delivery_date' => '',
                // 'chassi_number' => '',
                // 'iuc_expiration_date' => '',
                // 'tradein_observations' => ''
                'consumption' => '',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),  
            

            1 => 
            array (
                // 'id' => 2,
                'model_id' => '13', //Leon
                'variant' => 'Style Plus',
                'motorization' => 1000,
                'category_id' => '1', //Ligiero
                'registration' => 2019,
                'condition_id' => 2, //Usado
                'state_id' => 3, //Disponivel 
                //'komm' => '';
                'warranty_stand' => 12, //meses
                'warranty_make' => '2023/04',
                'plate' => '87-XL-41',
                'stand_id' => 1,
                'price' => 31000,
                // 'price_base' => '', carro antes dos extras
                //'price_new' => '',
                'price_campaign' => '25000',
                'tradein' => 0, //
                // 'tradein_purchase' => '',
                'tradein_sale' => '',
                // 'flexible' => '1',
                'deductible' => '0',
                'power' => 80,
                'km' => 25479,
                'transmission_id' => 2, //Manual
                'metallic_color' => 1, //boolean
                'drive_id' => 2, //Tração dianteira
                'fuel_id' => 2, //Diesel
                'door' => 5,
                'seats' => 5,
                'class_id' => 1,
                'registration_count' => '1',
        
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),  
            
            

        ));
    }
}
