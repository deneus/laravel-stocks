<?php

namespace Database\Factories;

use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
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
            'title' => $faker->word(),
            'description' => $faker->sentence(),
            'quantity' => rand(0, 10),
            'price' => rand( 0, 1) * 100,
            'path' => 'products/default.png',
            'subcategory_id' => Subcategory::all()->shuffle()->first()->id,
        ];
    }
}
