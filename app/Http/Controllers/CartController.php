<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart; // Import the Cart facade
use App\Models\Menu; // Import the Menus model

class CartController extends Controller
{
    public function showCart()
    {
        // Use the facade to retrieve the content
        $cartItems = Cart::content();

        return view('Pizza.cart', compact('cartItems'));
    }

    public function addToCart($id)
    {
        $menu = Menu::findOrFail($id);

        Cart::add([
            'id' => $menu->id,
            'name' => $menu->naam,
            'price' => $menu->prijs,
            'qty' => 1,
        ]);

        return redirect()->route('Menus')->with('success', 'Item added to cart.');
    }



    public function placeOrder(Request $request)
    {
        // Handle order placement logic here
        // Create Order model instance, save to database, etc.

        // Clear the cart after placing the order
        Cart::clear();

        return redirect()->route('Menus')->with('success', 'Order placed successfully.');
    }
}
