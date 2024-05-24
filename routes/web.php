<?php

use AnourValar\EloquentSerialize\Service;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ServiceCotroller;
use Illuminate\Support\Facades\Route;
use App\Livewire\ListService;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::get('/blog', [PostController::class, 'index'])->name('posts.index');

Route::get('/blog/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('/listservice', [ListService::class,'render'])->name('listservice');

Route::post('/sendId', [ListService::class,'getDdetail'])->name('sendID');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
});
