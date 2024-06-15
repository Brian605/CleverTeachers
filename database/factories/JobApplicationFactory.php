<?php

namespace Database\Factories;

use App\Models\JobApplication;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class JobApplicationFactory extends Factory
{
    protected $model = JobApplication::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'notes' => $this->faker->word(),
            'name' => $this->faker->name(),
            'files' => $this->faker->words(),
            'jobId' => $this->faker->randomNumber(),
        ];
    }
}
