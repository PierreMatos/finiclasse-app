<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => $this->faker->word,
        'email' => $this->faker->word,
        'email_verified_at' => $this->faker->date('Y-m-d H:i:s'),
        'password' => $this->faker->word,
        'city' => $this->faker->word,
        'adress' => $this->faker->word,
        'zip_code' => $this->faker->word,
        'phone' => $this->faker->randomDigitNotNull,
        'mobile_phone' => $this->faker->randomDigitNotNull,
        'nif' => $this->faker->randomDigitNotNull,
        'gdpr_confirmation' => $this->faker->date('Y-m-d H:i:s'),
        'gdpr_rejection' => $this->faker->date('Y-m-d H:i:s'),
        'gdpr_type' => $this->faker->word,
        'finiclasse_employee' => $this->faker->word,
        'stand_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
