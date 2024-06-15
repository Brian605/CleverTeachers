<?php

namespace Database\Factories;

use App\Models\Examiner;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ExaminerFactory extends Factory
{
    protected $model = Examiner::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'code' => $this->faker->word(),
            'description' => $this->faker->text(),
            'icon' => $this->faker->word(),
            'metadata' => $this->faker->words(),
        ];
    }
}
