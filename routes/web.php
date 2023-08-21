<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\RepliesController;
use Illuminate\Support\Facades\Auth;

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
// Route UI

Route::get('/', [QuestionsController::class, 'home']);

Auth::routes();

// Route::get('/login', function () {
//     return view('auth.login');
// });

Route::get('/about', function () {
    return view('about');
});
Route::get('/rules', function () {
    return view('rules');
});
// Route::get('/register', function () {
//     return view('auth.register');
// });

Route::middleware(['auth'])->group(function () {
    Route::resource('profile', ProfileController::class)->only(['index', 'update']);

});

Route::resource('questions', QuestionsController::class);

Route::resource('kategori', KategoriController::class);

Route::resource('replies', RepliesController::class);

	Route::post('/replies/{questions_id}', [RepliesController::class, 'store']);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
