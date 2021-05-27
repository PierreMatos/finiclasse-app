<?php

namespace Database\Factories;

use App\Models\ProposalState;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProposalStateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProposalState::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'order' => $this->faker->randomDigitNotNull,
        'color' => $this->faker->word,
        'visible' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
