<?php

use Illuminate\Support\Facades\Route;
use Spatie\Period\Period;

Route::view('/', 'welcome')->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/posts-reports', function () {
    $report = new \Domain\Blogging\Reports\PostsCreatedOverPeriod(
        Period::make('2023-10-07', '2023-10-08')
    );
    
    dd($report->totalPosts());
});

Route::prefix('posts')->as('posts:')->group(function () {

    Route::post('/', App\Http\Controllers\Web\Posts\StoreController::class)->name('store');
});