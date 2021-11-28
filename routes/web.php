<?php

use App\Http\Controllers\AdminStoryController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\StoryController;
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

Route::get('/', [StoryController::class, 'index'])->name('home');
Route::get('stories/{story}', [StoryController::class, 'show']);

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Admin Section
Route::middleware('can:admin')->group(function () {
    Route::get('admin/stories/create', [AdminStoryController::class, 'create']);
    Route::post('admin/stories', [AdminStoryController::class, 'store']);
});
