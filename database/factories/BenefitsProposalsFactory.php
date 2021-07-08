<?php

namespace Database\Factories;

use App\Models\BenefitsProposals;
use Illuminate\Database\Eloquent\Factories\Factory;

class BenefitsProposalsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BenefitsProposals::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'benefit_id' => $this->faker->randomDigitNotNull,
        'proposal_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
