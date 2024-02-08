<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
public function placeOrder(Request $request)
{
// Create a new order
$order = new Order();
$order->prijs = $request->prijs;
$order->user_id = Auth::id();
$order->menu_id = $request->menu_id;
// Add other fields here like grote_id, ingredients_id, status_id
// For example:
// $order->grote_id = $request->pizza_size;
// $order->ingredients_id = json_encode($request->ingredients);
// $order->status_id = 1; // Assuming status_id 1 represents "Placed"
$order->save();

// Redirect to the cart page after placing the order
return redirect()->route('cart.index');
}

public function index()
{
// Fetch all orders associated with the current user
$carts = Order::where('user_id', Auth::id())->get();
return view('Pizza.cart', compact('carts'));
}
}
