<?php
namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Maat;
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
        $order->grote = $request->grote; // Save selected pizza size
        $order->ingredients =$request->ingredients; // Convert array to string
        $order->status_id = 1; // Assuming status_id 1 represents "Placed"
        $order->save();

        // Redirect to the cart page after placing the order
        return redirect()->route('cart.index');
    }


    public function index()
    {
        $grotes = Maat::all(); // Fetch all sizes and factors from the database
        // Fetch all orders associated with the current user
        $carts = Order::where('user_id', Auth::id())->get();
        return view('Pizza.cart', compact('carts'));
    }


    public function deleteOrder($orderId)
    {
        // Find the order by ID
        $order = Order::findOrFail($orderId);

        // Check if the order belongs to the current user
        if ($order->user_id == Auth::id()) {
            // Delete the order
            $order->delete();

            // Redirect back to the cart page
            return redirect()->route('cart.index')->with('success', 'Order deleted successfully.');
        } else {
            // If the order doesn't belong to the current user, redirect back with an error message
            return redirect()->route('cart.index')->with('error', 'You are not authorized to delete this order.');
        }
    }
}

