<?php

namespace Database\Factories;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CarModel;
use App\Models\Make;


class CampaignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Campaign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->word,
            'make_id' => CarModel::all()->random()->id,
            'model_id' => Make::all()->random()->id,
            'type' => $this->faker->randomElement(['%','€']),
            'amount' => $this->faker->randomNumber($nbDigits = 5, $strict = false),
            'beginning' => $this->faker->date('Y-m-d H:i:s'),
            'end' => $this->faker->date('Y-m-d H:i:s'),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
