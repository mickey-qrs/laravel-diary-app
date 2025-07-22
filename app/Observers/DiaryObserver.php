<?php

namespace App\Observers;

use App\Models\Diary;
use Illuminate\Support\Facades\Storage;

class DiaryObserver
{
    public function deleting(Diary $diary): void
    {
        // 画像があれば物理削除する
        if ($diary->image_path && Storage::disk('public')->exists($diary->image_path)) {
            Storage::disk('public')->delete($diary->image_path);
        }
    }
}
