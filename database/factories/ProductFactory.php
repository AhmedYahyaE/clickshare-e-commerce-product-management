<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



     /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Product::class;


    public function definition(): array
    {
        return [
            // FakerPHP Library: https://fakerphp.org/formatters/text-and-paragraphs/
            'name'        => fake()->word(),
            'description' => fake()->paragraph(),
            'price'       => fake()->randomFloat(2, 7, 3000), // 2 decimal places, min price is 7, max price is 3000
            'quantity'    => fake()->numberBetween(1, 100) // min quantity is 1, max quantity is 100
        ];
    }
}
