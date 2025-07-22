<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Diary;

class DiarySeeder extends Seeder
{
    public function run(): void
    {
        Diary::factory()->count(10)->create();
    }
}
