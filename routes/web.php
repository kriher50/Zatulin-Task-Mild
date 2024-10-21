<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\NewsComponent;

Route::get('/', function () {
    return view('welcome');  // Вывод главной страницы
});

// Если используете Livewire компонент для новостей:
Route::get('/news', NewsComponent::class);
