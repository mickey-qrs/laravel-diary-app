<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiaryFactory extends Factory
{
    private static int $sequence = 1;

    public function definition(): array
    {
        // 今日から $sequence 日前
        $daysAgo = self::$sequence++;
        $date = Carbon::now()->subDays($daysAgo);

        return [
            'title' => $date->toDateString(), // 'Y-m-d' 形式
            'body' => $this->faker->realText(250),
            'image_path' => null,
            'created_at' => $date,
        ];
    }
}
