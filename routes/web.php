<?php

use App\Http\Controllers\DiaryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('diaries.index');
});

Route::resource('diaries', DiaryController::class);
