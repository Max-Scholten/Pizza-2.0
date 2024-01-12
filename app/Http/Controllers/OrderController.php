<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function create()
    {
        // Logic for displaying the order pop-up with view options
        // This can involve fetching available toppings and sizes from the database
        return view('orders.create');
    }

    public function store(Request $request)
    {
        // Logic for storing the order in the database
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'toppings' => $request->input('toppings'),
            'size' => $request->input('size'),
            'total_price' => $request->input('total_price'),
        ]);

        // Redirect to further ordering or cart menu
        return redirect()->route('orders.create')->with('order', $order);
    }

    public function show(Order $order)
    {
        // Logic for displaying the order details
        return view('orders.show', compact('order'));
    }
}
