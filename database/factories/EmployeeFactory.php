<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
//        $users_ids = Employee::whereNotNull('user_id')->pluck('user_id')->toArray();
//        $ids = User::whereNotIn('id', $users_ids)->pluck('id')->toArray();
        return [
            'job_title' => $this->faker->jobTitle,
            'hire_date' => $this->faker->date,
            'salary' => $this->faker->numberBetween(10000, 50000),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber(),
//            'user_id' => $this->faker->randomElement($ids)
        ];
    }
}
