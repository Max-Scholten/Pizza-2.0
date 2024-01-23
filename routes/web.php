<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FoodCartController;
use Illuminate\Support\Facades\Route;


// Other existing routes...
/*Route::get('/', function () {
    return view('Pizza/Home');
});*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Home page
Route::get('/home', function () {
    return view('/Pizza/home');
});

// Menu page
/*Route::get('/menu', function () {
    return view('/Pizza/menu');
});// Menu page*/
Route::get('/manager', function () {
    return view('/Pizza/manager');
});

Route::get('/Pizza/manager', [FoodCartController::class, 'update'])->name('manager');
// Add this route to your web.php file or routes file
Route::put('/Pizza/store', [FoodCartController::class, 'store'])->name('foodcard.store');
/*Route::put('/Pizza/update', [FoodCartController::class, 'update'])->name('foodcard.update');*/
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
//FoodCart

// OrderController
Route::get('/cart/{id}/edit', [OrderController::class, 'edit'])->name('cart.edit');
Route::post('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');

// PizzaController
// ... (other routes)

Route::get('/menu', [PizzaController::class, 'index'])->name('menu');
Route::post('/add-to-cart', [PizzaController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart', [PizzaController::class, 'showCart'])->name('show.cart');
Route::post('/Pizza/create', [FoodCartController::class, 'create'])->name('foodcard.create');
Route::get('/menu', [FoodCartController::class, 'showMenu'])->name('menu');

// ... (other routes)


//ProfileController
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// web.php



Route::get('/menu', [MenuController::class, 'showMenu'])->name('menu');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/place-order', [CartController::class, 'placeOrder'])->name('order.place');

require __DIR__.'/auth.php';
/*// In your routes file
Route::post('/upload-image', 'YourController@uploadImage')->name('upload.image');*/
