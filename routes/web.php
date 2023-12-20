<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('Pizza/Home');
});*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/Home', function () {
    return view('/Pizza/Home');
});
Route::get('/Menu', function () {
    return view('/Pizza/Menu');
});
// Questionnaire routes
Route::middleware('auth', 'role:user')->group(
    function () {
    }
);

Route::middleware('auth', 'role:user|manager')->group(
    function () {

    }
);

Route::middleware('auth', 'role:manager')->group(
    function () {
    }
);

// Contact page
Route::get('/contact', function () {
    return view('/Pizza/contact');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
