<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/dashboard/tweet', \App\Http\Controllers\Tweet\IndexController::class)->name('tweet.index');

Route::middleware('auth')->group(function () {
    Route::post('/dashboard/tweet/create',  \App\Http\Controllers\Tweet\CreateController::class)
    ->name('tweet.create');
    Route::get('/dashboard/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\IndexController::class)
    ->name('tweet.update.index')->where('tweetID', '[0-9]+');
    Route::put('/dashboard/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\PutController::class)
    ->name('tweet.update.put')->where('tweetID', '[0-9]+');
    Route::delete('/dashboard/tweet/delete/{tweetId}', \App\Http\Controllers\Tweet\DeleteController::class)
    ->name('tweet.delete');
});
