<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\FoodCartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientController;


// Other existing routes...
Route::get('/', function () {
    return view('Pizza/home');
});
/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Menu page
/*Route::get('/menu', function () {
    return view('/Pizza/menu');
});// Menu page*/
Route::get('/manager', function () {
    return view('/Menus/manager');
});


Route::get('/index', function () {
    return view('/ingredients/index');
});

Route::get('/create', function () {
    return view('/ingredients/create');
});

Route::get('/edit', function () {
    return view('/ingredients/edit');
});
Route::get('/menu', function () {
    return view('/Pizza/menu');
});


Route::get('/Menus/manager', [FoodCartController::class, 'update'])->name('manager');
Route::post('/Menus', [FoodCartController::class, 'store'])->name('foodcard.store');
Route::put('/Pizza/create', [FoodCartController::class, 'create'])->name('foodcard.create');
// Add these routes to your web.php file
// Route for editing a pizza
Route::get('/Pizza/{id}/edit', [FoodCartController::class, 'edit'])->name('Pizza.manager');

// Route for updating a pizza
Route::put('/Pizza/{id}/update', [FoodCartController::class, 'update'])->name('pizza.update');
Route::put('/Pizza/{id}/update', [FoodCartController::class, 'update'])->name('foodcart.update');


Route::get('/menu', function () {
    return redirect('/Pizza/menu');
});


// Over ons page
Route::get('/over-ons', function () {
    return view('/Pizza/over-ons');
});

// Cart page
Route::get('/cart', function () {
    return view('/Pizza/cart');
});

// Contact page
Route::get('/contact', function () {
    return view('/Pizza/contact');
});

// routes/web.php

// ...
// Route to display the cart
Route::get('/Pizza/cart', [CartController::class, 'index'])->name('pizza.cart');
// Route to display the menu
Route::get('/Pizza/menu', [OrderController::class, 'showmenu'])->name('pizza.menu');
// Route to edit a pizza
Route::get('/Pizza/edit/{id}', [FoodCartController::class, 'edit'])->name('pizza.edit');
// Route to update a pizza
Route::put('/Pizza/update/{id}', [FoodCartController::class, 'update'])->name('pizza.update');
// Route to create a new pizza (display the form)
Route::get('/Pizza/create', [FoodCartController::class, 'create'])->name('pizza.create');
// Route to store a new pizza
Route::post('/Menus/store', [FoodCartController::class, 'store'])->name('pizza.store');
Route::delete('/menu/{id}', [FoodCartController::class, 'destroy'])->name('menu.destroy');

Route::get('/menu/{id}/edit', [FoodCartController::class, 'edit'])->name('menu.edit');

// Routes for eenheden CRUD

Route::get('/units/index', [UnitsController::class, 'index'])->name('units.index');
Route::get('/units/create', [UnitsController::class, 'create'])->name('units.create');
Route::post('/units', [UnitsController::class, 'store'])->name('units.store');
Route::get('/units/edit', [UnitsController::class, 'edit'])->name('units.edit');
Route::get('/units/{id}/edit', [UnitsController::class, 'edit'])->name('units.edit');
Route::delete('/units/{id}', [UnitsController::class, 'destroy'])->name('units.destroy');
Route::put('/units/{id}', [UnitsController::class, 'update'])->name('units.update');


// Routes for eenheden CRUD
Route::get('/ingredients/index', [IngredientController::class, 'index'])->name('ingredients.index   ');
Route::get('/ingredients/create', [IngredientController::class, 'create'])->name('ingredients.create');
Route::post('/ingredients', [IngredientController::class, 'store'])->name('ingredients.store');
Route::get('/ingredients/edit', [IngredientController::class, 'edit'])->name('ingredients.edit');
Route::get('/ingredients/{id}/edit', [IngredientController::class, 'edit'])->name('ingredients.edit');
Route::delete('/ingredients/{id}', [IngredientController::class, 'destroy'])->name('ingredients.destroy');
Route::put('/ingredients/{id}', [IngredientController::class, 'update'])->name('ingredients.update');

// routes/web.php

Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients.index');

Route::post('/place-order', [CartController::class, 'placeOrder'])->name('place.order');

Route::post('/Pizza', [CartController::class, 'store'])->name('pizza.store');


Route::delete('/cart/{orderId}', [CartController::class, 'deleteOrder'])->name('cart.delete');
Route::post('/place-order', [CartController::class, 'placeOrder'])->name('cart.placeOrder');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

//ProfileController
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
