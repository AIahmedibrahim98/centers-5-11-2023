<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Branch;
use App\Models\ClassRoom;
use App\Models\Company;
use App\Models\Course;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(500)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            CategorySeeder::class
        ]);
        User::factory(500)->create();
        Company::factory(500)->create();
        Branch::factory(500)->create();
        Manager::factory(500)->create();
        Vendor::factory(500)->create();
        Employee::factory(500)->create();
        ClassRoom::factory(500)->create();
        Course::factory(500)->create();

        foreach (Employee::all() as $employee) {
            $users_ids = Employee::whereNotNull('user_id')->pluck('user_id')->toArray();
            $ids = User::whereNotIn('id', $users_ids)->pluck('id')->toArray();
            $employee->update(['user_id'=> fake()->randomElement($ids)]);
        }

        foreach (range(1,Manager::count()) as $num) {
            Manager::find($num)->update(['company_id'=>$num]);
        }
    }
}
