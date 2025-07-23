<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'image_path',
    ];

    protected static function booted()
    {
        // 作成時のタイトル補完
        static::creating(function ($diary) {
            if (empty($diary->title)) {
                $diary->title = now()->format('Y-m-d');
            }
        });

        // 更新時のタイトル補完
        static::updating(function ($diary) {
            if (empty($diary->title)) {
                $diary->title = now()->format('Y-m-d');
            }
        });
    }
}
