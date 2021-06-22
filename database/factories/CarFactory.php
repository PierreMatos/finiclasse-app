<?php

namespace Database\Factories;

use App\Models\Make;
use App\Models\CarModel;
use App\Models\CarCategory;
use App\Models\CarCondition;
use App\Models\CarState;
use App\Models\CarFuel;
use App\Models\Stand;
use App\Models\CarDrive;
use App\Models\CarClass;
use App\Models\CarTransmission;
use Carbon\Carbon;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
     
   /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $current = Carbon::now();
        $current = '2021/06/10';

        return [
        // 'make_id' => Make::all()->random()->id,
        'model_id' => CarModel::all()->random()->id,
        'variant' =>  $this->faker->randomElement(['Station','AMG','Cupra','BlackSeries','Performance','Sport']),
        'motorization' => $this->faker->randomElement(['180','200','220','300','320','500']),
        'category_id' => CarCategory::all()->random()->id,
        'registration' => $current,
        'condition_id' => CarCondition::all()->random()->id,
        'state_id' =>  CarState::all()->random()->id,
        'model_id' => $this->faker->randomDigitNotNull,
        'variant' => $this->faker->word,
        'motorization' => $this->faker->randomDigitNotNull,
        'category_id' => $this->faker->randomDigitNotNull,
        'registration' => $current,
        'condition_id' => $this->faker->randomDigitNotNull,
        'state_id' => $this->faker->randomDigitNotNull,
        'komm' => $this->faker->randomDigitNotNull,
        'warranty_stand' => $this->faker->randomDigitNotNull,
        'warranty_make' => $this->faker->randomDigitNotNull,
        'plate' => $this->faker->word,
        'stand_id' =>  Stand::all()->random()->id,
        'stand_id' => $this->faker->randomDigitNotNull,
        'price' => $this->faker->randomDigitNotNull,
        'price_base' => $this->faker->randomDigitNotNull,
        'price_new' => $this->faker->randomDigitNotNull,
        'price_campaign' => $this->faker->randomDigitNotNull,
        'tradein' => 0,
        'tradein_purchase' => $this->faker->randomDigitNotNull,
        'tradein_sale' => $this->faker->randomDigitNotNull,
        'felxible' => 0,
        'deductible' => 0,
        'felxible' => 0,
        'deductible' => 0,
        'power' => $this->faker->randomDigitNotNull,
        'km' => $this->faker->randomDigitNotNull,
        'transmission_id' =>  CarTransmission::all()->random()->id,
        'transmission_id' => $this->faker->randomDigitNotNull,
        'color_interior' => $this->faker->word,
        'color_exterior' => $this->faker->word,
        'metallic_color' => 0,
        'drive_id' =>  CarDrive::all()->random()->id,
        'drive_id' => $this->faker->randomDigitNotNull,
        'fuel_id' => CarFuel::all()->random()->id,
        'door' => $this->faker->randomDigitNotNull,
        'seats' => $this->faker->randomDigitNotNull,
        'class_id' =>  CarClass::all()->random()->id,
        'class_id' => $this->faker->randomDigitNotNull,
        'autonomy' => $this->faker->randomDigitNotNull,
        'emissions' => $this->faker->randomDigitNotNull,
        'iuc' => $this->faker->randomDigitNotNull,
        'registration_count' => $this->faker->randomDigitNotNull,
        'order_date' => $current,
        'arrival_date' => $current,
        'delivery_date' => $current,
        'order_date' => $current,
        'arrival_date' => $current,
        'delivery_date' => $current,
        'chassi_number' => $this->faker->randomDigitNotNull,
        'iuc_expiration_date' => $current,
        'inspection_expiration_date' => $current,
        'iuc_expiration_date' => $current,
        'inspection_expiration_date' => $current,
        'tradein_observations' => $this->faker->word,
        'consumption' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}