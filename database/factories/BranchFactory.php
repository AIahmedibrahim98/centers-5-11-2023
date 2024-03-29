<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $companies_ids = Company::pluck('id')->toArray();
        return [
            'name'=>$this->faker->streetName,
            'location'=>$this->faker->address,
            'phone'=> $this->faker->phoneNumber,
            'company_id'=> $this->faker->randomElement($companies_ids)

        ];
    }
}
