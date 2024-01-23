<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
// Other actions...
public function index()
{
    $pizzas = Order::all(); // Assuming you have a Pizza model

    return view('menu', compact('pizzas'));
}
public function showMenu()
{
    $pizzas = Order::all(); // Assuming you have a Pizza model

    return view('Pizza/menu', compact('pizzas'));
}
public function addToCart(Request $request)
{
$pizzaId = $request->input('pizza_id');
$size = $request->input('size') ;

// Retrieve the selected pizza from the database (assuming you have a Pizza model)
$pizza = Order::find($pizzaId);

// Add the selected pizza to the user's cart (you might use a cart service or a session)
$cart = session('cart', []);
$cart[] = [
'pizza' => $pizza,
'size' => $size,
];
session(['cart' => $cart]);

return redirect()->route('menu')->with('success', 'Pizza added to cart!');
}

public function showCart()
{
$cart = session('cart', []);

return view('Pizza/cart', compact('cart'));
}
}
