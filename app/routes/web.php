<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'ideas/', 'as' => 'ideas.',], function () {

    Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');

    Route::group(['middleware' => ['auth']], function () {

        Route::post('', [IdeaController::class, 'store'])->name('store');

        Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');

        Route::put('/{idea}/edit', [IdeaController::class, 'update'])->name('update');

        Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');

        Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
    });
});

Route::resource('users', UserController::class)->only('show','edit','update')->middleware('auth');

Route::get('profile', [UserController::class,'profile'])->middleware('auth')->name('profile');

Route::post('users/{user}/follow',[FollowerController::class,'follow'])->middleware('auth')->name('users.follow');

Route::post('users/{user}/unfollow',[FollowerController::class,'unfollow'])->middleware('auth')->name('users.unfollow');



// Route::delete('/{id}', [IdeaController::class,'store'])->name('ideas.destroy');

// Route::resource('ideas', IdeaController::class)->except('index', 'show')->middleware('auth');

// Route::resource('ideas', IdeaController::class)->only('show');

// Route::resource('comments', CommentController::class)->only('store')->middleware('auth');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');




