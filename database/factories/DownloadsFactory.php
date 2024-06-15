<?php

namespace Database\Factories;

use App\Models\Downloads;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DownloadsFactory extends Factory
{
    protected $model = Downloads::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'file' => $this->faker->word(),
            'views' => $this->faker->randomNumber(),
            'downloads' => $this->faker->randomNumber(),
        ];
    }
}
