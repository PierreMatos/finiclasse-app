<?php

namespace Database\Factories;

use App\Models\FinancingProposal;
use Illuminate\Database\Eloquent\Factories\Factory;

class FinancingProposalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FinancingProposal::class;

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
        'value' => $this->faker->randomDigitNotNull,
        'document' => $this->faker->word,
        'financing_id' => $this->faker->randomDigitNotNull,
        'proposal_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
