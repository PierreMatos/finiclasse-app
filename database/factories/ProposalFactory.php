<?php

namespace Database\Factories;

use App\Models\Proposal;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\ProposalState;
use App\Models\BusinessStudy;
use App\Models\Car;


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
        'price' => $this->faker->randomNumber($nbDigits = 5, $strict = false),
        'pos_number' => $this->faker->randomNumber($nbDigits = 9, $strict = false),
        'prop_value' => $this->faker->randomNumber($nbDigits = 4, $strict = false),
        'first_contact_date' => $this->faker->date('Y-m-d H:i:s'),
        'last_contact_date' => $this->faker->date('Y-m-d H:i:s'),
        'next_contact_date' => $this->faker->date('Y-m-d H:i:s'),
        'contract' => $this->faker->word,
        'test_drive' => $this->faker->boolean,
        'state_id' =>  ProposalState::all()->random()->id,
        'business_study_id' =>  BusinessStudy::all()->random()->id,
        'comment' => $this->faker->sentence,
        'tradein_diff' => $this->faker->randomDigitNotNull,
        'settle_amount' => $this->faker->randomDigitNotNull,
        'total_diff_amount' => $this->faker->randomDigitNotNull,
        'total_discount_amount' => $this->faker->randomDigitNotNull,
        'total_discount_perc' => $this->faker->randomDigitNotNull,  
        'car_id' => Car::all()->random()->id,
        'tradein_id' => Car::all()->random()->id,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
