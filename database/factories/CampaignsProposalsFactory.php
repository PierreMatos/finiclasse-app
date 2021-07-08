<?php

namespace Database\Factories;

use App\Models\CampaignsProposals;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignsProposalsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CampaignsProposals::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'campaign_id' => $this->faker->randomDigitNotNull,
        'proposal_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
