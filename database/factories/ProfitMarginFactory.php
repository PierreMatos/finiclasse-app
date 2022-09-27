<?php

namespace Database\Factories;

use App\Models\ProfitMargin;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfitMarginFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProfitMargin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'make_id' => $this->faker->randomDigitNotNull,
        'car_fuel_id' => $this->faker->randomDigitNotNull,
        'car_category_id' => $this->faker->randomDigitNotNull,
        'level_1' => $this->faker->randomDigitNotNull,
        'level_2' => $this->faker->randomDigitNotNull,
        'level_3' => $this->faker->randomDigitNotNull
        ];
    }
}
