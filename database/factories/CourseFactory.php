<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> $this->faker->word,
            'hours' => $this->faker->numberBetween(20,100),
            'price' => $this->faker->numberBetween(2000,15000),
            'description' => $this->faker->sentence(10),
            'category_id'=> Category::inRandomOrder()->first()->id,
            'vendor_id' => Vendor::inRandomOrder()->first()->id,
        ];
    }
}
