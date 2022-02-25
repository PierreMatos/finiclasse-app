<?php

namespace Database\Factories;

use App\Models\BusinessStudyAuthorization;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessStudyAuthorizationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BusinessStudyAuthorization::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'name' => $this->faker->word,
        'min' => $this->faker->randomDigitNotNull,
        'max' => $this->faker->randomDigitNotNull,
        'responsible_id' => $this->faker->randomDigitNotNull,
        'color' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
