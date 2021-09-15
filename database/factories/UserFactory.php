<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Stand;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'name' => $this->faker->name,
        'email' => $this->faker->email,
        'email_verified_at' => $this->faker->date('Y-m-d H:i:s'),
        'password' => $this->faker->md5,
        'city' => $this->faker->city,
        'adress' => $this->faker->streetAddress,
        'zip_code' => $this->faker->postcode,
        'mobile_phone' => $this->faker->randomNumber($nbDigits = 9, $strict = false),
        'phone' => $this->faker->randomNumber($nbDigits = 9, $strict = false),
        'nif' => $this->faker->randomDigitNotNull,
        'gdpr_confirmation' => $this->faker->date('Y-m-d H:i:s'),
        'gdpr_rejection' => $this->faker->date('Y-m-d H:i:s'),
        'gdpr_type' => $this->faker->word,
        'finiclasse_employee' => 0,
        'stand_id' => Stand::all()->random()->id,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
