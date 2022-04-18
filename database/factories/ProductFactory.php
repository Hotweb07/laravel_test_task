<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->sentence(4, true),
            'price' => $this->faker->randomFloat(2,1,5000),
            'image' => $this->faker->imageUrl(369, 296),
            'description' => $this->faker->sentence(),        
        ];
    }
}
