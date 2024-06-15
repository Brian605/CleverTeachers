<?php

namespace Database\Factories;

use App\Models\Semester;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SemesterFactory extends Factory
{
    protected $model = Semester::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now(),
            'status' => $this->faker->word(),
            'name' => $this->faker->name(),
            'createdBy' => $this->faker->randomNumber(),
        ];
    }
}
