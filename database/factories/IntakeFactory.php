<?php

namespace Database\Factories;

use App\Models\Intake;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class IntakeFactory extends Factory
{
    protected $model = Intake::class;

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
