<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart; // Import the Cart facade
use App\Models\Menu; // Import the Menu model

class CartController extends Controller
{
    public function showCart()
    {
        $cartItems = Cart::getContent();

        return view('Pizza.cart', compact('cartItems')); // Assuming your view is in the "Pizza" directory
    }

    public function addToCart($id)
    {
        $menu = Menu::findOrFail($id);

        Cart::add([
            'id' => $menu->id,
            'name' => $menu->naam,
            'price' => $menu->prijs,
            'quantity' => 1,
        ]);

        return redirect()->route('menu')->with('success', 'Item added to cart.');
    }

    public function placeOrder(Request $request)
    {
        // Handle order placement logic here
        // Create Order model instance, save to database, etc.

        // Clear the cart after placing the order
        Cart::clear();

        return redirect()->route('menu')->with('success', 'Order placed successfully.');
    }
}
