<?php

namespace Database\Factories;

use App\Models\PastPaper;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PastPaperFactory extends Factory
{
    protected $model = PastPaper::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'subject' => $this->faker->word(),
            'file' => $this->faker->word(),
            'views' => $this->faker->randomNumber(),
            'downloads' => $this->faker->word(),
            'school' => $this->faker->word(),
        ];
    }
}
