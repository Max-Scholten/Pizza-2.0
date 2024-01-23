<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Maat;
use App\Models\Ingredient;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $users = User::all();
        $maats = Maat::all();
        $ingredient = Ingredient::all();
        $statuses = Status::all();

        return view('orders.edit', compact('order', 'users', 'maats', 'ingredient', 'statuses'));
    }



    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'grote_id' => 'nullable|exists:maats,id',
            'ingredient_id' => 'nullable|exists:ingredient,id',
            'status_id' => 'nullable|exists:statuses,id',
            // Add validation rules for other fields if needed
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order updated successfully');
    }
}
