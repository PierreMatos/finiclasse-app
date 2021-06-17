<?php

namespace Database\Factories;

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
        return [
            'model_id' => $this->faker->randomDigitNotNull,
        'variant' => $this->faker->word,
        'motorization' => $this->faker->randomDigitNotNull,
        'category_id' => $this->faker->randomDigitNotNull,
        'registration' => $this->faker->word,
        'condition_id' => $this->faker->randomDigitNotNull,
        'state_id' => $this->faker->randomDigitNotNull,
        'komm' => $this->faker->randomDigitNotNull,
        'warranty_stand' => $this->faker->randomDigitNotNull,
        'warranty_make' => $this->faker->randomDigitNotNull,
        'plate' => $this->faker->word,
        'stand_id' => $this->faker->randomDigitNotNull,
        'price' => $this->faker->randomDigitNotNull,
        'price_base' => $this->faker->randomDigitNotNull,
        'price_new' => $this->faker->randomDigitNotNull,
        'price_campaign' => $this->faker->randomDigitNotNull,
        'tradein' => $this->faker->word,
        'tradein_purchase' => $this->faker->randomDigitNotNull,
        'tradein_sale' => $this->faker->randomDigitNotNull,
        'felxible' => $this->faker->word,
        'deductible' => $this->faker->word,
        'power' => $this->faker->randomDigitNotNull,
        'km' => $this->faker->randomDigitNotNull,
        'transmission_id' => $this->faker->randomDigitNotNull,
        'color_interior' => $this->faker->word,
        'color_exterior' => $this->faker->word,
        'metallic_color' => $this->faker->word,
        'drive_id' => $this->faker->randomDigitNotNull,
        'fuel_id' => $this->faker->randomDigitNotNull,
        'door' => $this->faker->randomDigitNotNull,
        'seats' => $this->faker->randomDigitNotNull,
        'class_id' => $this->faker->randomDigitNotNull,
        'autonomy' => $this->faker->randomDigitNotNull,
        'emissions' => $this->faker->randomDigitNotNull,
        'iuc' => $this->faker->randomDigitNotNull,
        'registration_count' => $this->faker->randomDigitNotNull,
        'order_date' => $this->faker->word,
        'arrival_date' => $this->faker->word,
        'delivery_date' => $this->faker->word,
        'chassi_number' => $this->faker->randomDigitNotNull,
        'iuc_expiration_date' => $this->faker->word,
        'inspection_expiration_date' => $this->faker->word,
        'tradein_observations' => $this->faker->word,
        'consumption' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
