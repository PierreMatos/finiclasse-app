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
        // 'registration' => '2018',
        'condition_id' => CarCondition::all()->random()->id,
        'state_id' =>  CarState::all()->random()->id,
        'komm' => $this->faker->randomDigitNotNull,
        'warranty_stand' => $this->faker->randomDigitNotNull,
        'warranty_make' => $this->faker->randomDigitNotNull,
        'plate' => $this->faker->word,
        'stand_id' =>  Stand::all()->random()->id,
        'price' => $this->faker->randomNumber($nbDigits = 5, $strict = false),
        'price_base' => $this->faker->randomNumber($nbDigits = 5, $strict = false),
        'price_new' => $this->faker->randomNumber($nbDigits = 5, $strict = false),
        'price_campaign' => $this->faker->randomNumber($nbDigits = 5, $strict = false),
        'tradein' => 0,
        'tradein_purchase' => $this->faker->randomDigitNotNull,
        'tradein_sale' => $this->faker->randomDigitNotNull,
        'felxible' => 0,
        'deductible' => 0,
        'felxible' => 0,
        'deductible' => 0,
        'power' => $this->faker->randomNumber($nbDigits = 3, $strict = false),
        'km' => $this->faker->randomNumber($nbDigits = 9, $strict = false),
        'transmission_id' =>  CarTransmission::all()->random()->id,
        'color_interior' => $this->faker->word,
        'color_exterior' => $this->faker->word,
        'metallic_color' => 0,
        'drive_id' =>  CarDrive::all()->random()->id,
        'fuel_id' => CarFuel::all()->random()->id,
        'door' => $this->faker->randomDigitNotNull,
        'seats' => $this->faker->randomDigitNotNull,
        'class_id' =>  CarClass::all()->random()->id,
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
        'extras_total' => $this->faker->randomNumber($nbDigits = 5, $strict = false),
        'sub_total' => $this->faker->randomNumber($nbDigits = 5, $strict = false),
        'buying_price' => $this->faker->randomNumber($nbDigits = 5, $strict = false),
        'selling_price' => $this->faker->randomNumber($nbDigits = 5, $strict = false),
        'iva' => $this->faker->randomNumber($nbDigits = 5, $strict = false),
        'isv' => $this->faker->randomNumber($nbDigits = 5, $strict = false),
        'ptl' => $this->faker->randomNumber($nbDigits = 4, $strict = false),
        'sigpu' => $this->faker->randomNumber($nbDigits = 3, $strict = false),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}