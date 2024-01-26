<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFoodCartRequest;
use App\Models\Menu;
use App\Models\Order;
use App\Models\User;
use App\Models\Maat;
use App\Models\Ingredient;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showMenu()
    {
        $pizzas = Menu::all();
        $grotes = Maat::all();
        $ingredients = Ingredient::all();
        return view('Pizza.menu', compact('pizzas', 'grotes', 'ingredients'));
    }
    public function edit($id)
    {
        $pizza = Menu::findOrFail($id);
        return view('Pizza.edit', compact('pizza'));
    }

    public function update(UpdateFoodCartRequest $request, $id)
    {
        // Find the Menus item by ID
        $menu = Menu::findOrFail($id);

        // Validate the input data
        $request->validate([
            'naam' => 'required',
            'beschrijving' => 'required',
            'prijs' => 'required',
        ]);

        // Update Menus item details
        $menu->update([
            'naam' => $request->input('soort'),
            'beschrijving' => $request->input('beschrijving'),
            'prijs' => $request->input('prijs'),
        ]);

        // Sync the selected ingredients
        $menu->ingredients()->sync($request->input('ingredients', []));

        // Redirect back to the Menus or wherever appropriate
        return redirect()->route('Menus')->with('success', 'Menus item updated successfully');
    }

    public function store(Request $request)
    {

        $request->validate([
            'naam' => 'required|string',
            'beschrijving' => 'required|string',
            'prijs' => 'required|numeric',
            'pizza_size' => 'required|exists:maats,id',
            'ingredients' => 'array',
            'ingredients.*' => 'exists:ingredients,id',
        ]);

        // Calculate total cost based on ingredients and size factor
        $ingredientCost = Ingredient::whereIn('id', $request->input('ingredients', []))->sum('price');
        $sizeFactor = Maat::findOrFail($request->input('pizza_size'))->factor;
        $totalPrice = $request->input('prijs') + ($ingredientCost * $sizeFactor);

        // Create a new Order
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'menu_id' => $request->input('menu_id'),
            'size_id' => $request->input('pizza_size'),
            'ingredients_id' => $request->input('ingredients', []),
            'total_price' => $totalPrice,
            'status_id' => 1, // Assuming 1 is the default status
        ]);

        return redirect()->route('menu')->with('success', 'Food card created successfully.');
    }

    public function create(UpdateFoodCartRequest $request)
    {
        // Retrieve all ingredients from the database

        // Create a new Menus instance
        $menu = new Menu();

        // Handle file upload
        if ($request->hasFile('foodcart')) {
            $path = $request->file('foodcart')->store('foodcarts', 'public');
            $menu->afbeelding = "/$path"; // Update this line
        }

        // Set other Menus-related data
        $menu->naam = $request->input('naam');
        $menu->beschrijving = $request->input('beschrijving');
        $menu->prijs = $request->input('prijs');


        // Assign the authenticated user to the Menus
        $menu->user_id = auth()->user()->id;

        // Save the Menus
        $menu->save();

        // Attach selected ingredients to the Menus


        // Redirect or return a response as needed
        return redirect()->route('Menus')->with('success', 'Menus item created successfully');
    }
}
