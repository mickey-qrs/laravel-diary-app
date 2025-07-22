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

        return [
            'title' => $date . 'の日記',
            'body' => $this->faker->realText($maxNbChars = 250),
            'image_path' => null, // 画像はなし
        ];
    }
}
