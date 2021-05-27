<?php

namespace Database\Factories;

use App\Models\BenefitsBusinessStudy;
use Illuminate\Database\Eloquent\Factories\Factory;

class BenefitsBusinessStudyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BenefitsBusinessStudy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'benefits_id' => $this->faker->randomDigitNotNull,
        'business_study_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
