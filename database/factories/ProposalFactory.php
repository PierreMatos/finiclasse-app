<?php

namespace Database\Factories;

use App\Models\Proposal;
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
            'client_id' => $this->faker->randomDigitNotNull,
        'vendor_id' => $this->faker->randomDigitNotNull,
        'price' => $this->faker->randomDigitNotNull,
        'pos_number' => $this->faker->randomDigitNotNull,
        'prop_value' => $this->faker->randomDigitNotNull,
        'financing_id' => $this->faker->randomDigitNotNull,
        'first_contact_date' => $this->faker->randomDigitNotNull,
        'last_contact_date' => $this->faker->randomDigitNotNull,
        'next_contact_date' => $this->faker->randomDigitNotNull,
        'contract' => $this->faker->word,
        'test_drive' => $this->faker->word,
        'state_id' => $this->faker->randomDigitNotNull,
        'business_study_id' => $this->faker->randomDigitNotNull,
        'comment' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
