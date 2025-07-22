<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DiaryFactory extends Factory
{
    private static int $sequence = 1;

    public function definition(): array
    {
        // 今日から $sequence 日前
        $daysAgo = self::$sequence++;
        $date = now()->subDays($daysAgo)->format('Y-m-d');
        $dateTime = now()->subDays($daysAgo)->format('Y-m-d H:i:s');

        return [
            'title' => $date,
            'body' => $this->faker->realText($maxNbChars = 250),
            'image_path' => null, // 画像はなし
            'created_at' => $dateTime,
        ];
    }
}
