<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Diary;
use App\Observers\DiaryObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 
        Diary::observe(DiaryObserver::class);
    }
}
