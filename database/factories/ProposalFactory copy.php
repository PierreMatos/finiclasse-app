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
        // dd( $this->faker->randomNumber($nbDigits = 5, $strict = false));
        return [
        'client_id' => User::all()->random()->id,
        'vendor_id' => User::all()->random()->id,
        'price' => $this->faker->randomNumber($nbDigits = 5, $strict = false),
        'pos_number' => $this->faker->randomNumber($nbDigits = 9, $strict = false),
        'prop_value' => $this->faker->randomNumber($nbDigits = 4, $strict = false),
        'financing_id' => Financing::all()->random()->id,
        'first_contact_date' => $this->faker->date('Y-m-d H:i:s'),
        'last_contact_date' => $this->faker->date('Y-m-d H:i:s'),
        'next_contact_date' => $this->faker->date('Y-m-d H:i:s'),
        'contract' => $this->faker->word,
        'test_drive' => $this->faker->boolean,
        'state_id' => ProposalState::all()->random()->id,
        'business_study_id' => BusinessStudy::all()->random()->id,
        'comment' => $this->faker->setence,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
