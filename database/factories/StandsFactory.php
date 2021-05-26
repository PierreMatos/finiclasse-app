<?php

namespace Database\Factories;

use App\Models\Stands;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;


class StandsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stands::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$faker->randomElement(['Vegetables','Sandwiches','Protein','Grains','Drinks']),
            'description'=>$faker->sentences(5,true),
        ];
    }
}
