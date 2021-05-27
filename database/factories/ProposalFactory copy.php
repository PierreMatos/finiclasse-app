<?php

namespace Database\Factories;

use App\Models\Proposal;
use App\Models\User;
use App\Models\Financing;
use App\Models\ProposalState;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProposalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proposal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'client_id' => User::all()->random()->id,
        'vendor_id' => User::all()->random()->id,
        'price' => $this->faker->randomDigitNotNull,
        'pos_number' => $this->faker->randomDigitNotNull,
        'prop_value' => $this->faker->randomDigitNotNull,
        'financing_id' => Financing::all()->random()->id,
        'first_contact_date' => $this->faker->randomDigitNotNull,
        'last_contact_date' => $this->faker->randomDigitNotNull,
        'next_contact_date' => $this->faker->randomDigitNotNull,
        'contract' => $this->faker->word,
        'test_drive' => $this->faker->word,
        'state_id' => ProposalState::all()->random()->id,
        'business_study_id' => BusinessStudy::all()->random()->id,
        'comment' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
