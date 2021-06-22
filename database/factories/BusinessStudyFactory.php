<?php

namespace Database\Factories;

use App\Models\BusinessStudy;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Car;
use App\Models\User;
use App\Models\BusinenssStudyAuthorization;


class BusinessStudyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BusinessStudy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'client_id' => User::all()->random()->id,
        'car_id' => Car::all()->random()->id,
        'extras_total' => $this->faker->randomDigitNotNull,
        'sub_total' => $this->faker->randomDigitNotNull,
        'total_benefits' => $this->faker->randomDigitNotNull,
        'selling_price' => $this->faker->randomDigitNotNull,
        'tradein_id' => $this->faker->randomDigitNotNull,
        'tradein_diff' => $this->faker->randomDigitNotNull,
        'settle_amount' => $this->faker->randomDigitNotNull,
        'total_diff_amount' => $this->faker->randomDigitNotNull,
        'total_discount_amount' => $this->faker->randomDigitNotNull,
        'total_discount_perc' => $this->faker->randomDigitNotNull,  
        'iva' => $this->faker->randomDigitNotNull,
        'isv' => $this->faker->randomDigitNotNull,
        'business_study_authorization_id' => BusinenssStudyAuthorization::all()->random()->id,
        'tradein_id' => null,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        ];
    }
}
