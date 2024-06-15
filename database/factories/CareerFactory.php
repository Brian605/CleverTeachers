<?php

namespace Database\Factories;

use App\Models\Career;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CareerFactory extends Factory
{
    protected $model = Career::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'banner' => $this->faker->word(),
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'responsibilities' => $this->faker->word(),
            'requirements' => $this->faker->word(),
            'applyBy' => Carbon::now(),
            'maxApplications' => $this->faker->randomNumber(),
            'fees' => $this->faker->randomNumber(),
        ];
    }
}
