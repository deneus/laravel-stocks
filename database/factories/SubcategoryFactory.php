<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubcategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();

        return [
            'label' => 'SUB_' . $faker->text(20),
            'icon' => 'fa-solid fa-jedi',
            'category_id' => Category::all()->shuffle()->first()->id,
        ];
    }
}
