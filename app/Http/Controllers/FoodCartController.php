<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFoodCartRequest;
use App\Http\Requests\MenuRequest;
use App\Models\Band;
use App\Models\Ingredient;
use App\Models\Menu;

class FoodCartController extends Controller
{
    public function showMenu()
    {
        $pizzas = Menu::all();
        return view('Pizza.menu', compact('pizzas'));
    }
    public function edit($id)
    {
        $pizza = Menu::findOrFail($id);
        return view('Pizza.edit', compact('pizza'));
    }
    public function update(UpdateFoodCartRequest $request, $id)
    {
        // Find the menu item by ID
        $menu = Menu::findOrFail($id);

        // Validate the input data
        $request->validate([
            'naam' => 'required',
            'beschrijving' => 'required',
        ]);

        // Update menu item details
        $menu->update([
            'naam' => $request->input('naam'),
            'beschrijving' => $request->input('beschrijving'),
        ]);

        // Sync the selected ingredients
        $menu->ingredients()->sync($request->input('ingredients', []));

        // Redirect back to the menu or wherever appropriate
        return redirect()->route('menu')->with('success', 'Menu item updated successfully');
    }


    public function store(MenuRequest $request)
    {
        Menu::create($request->validated()); // Mass assignment

        return redirect()->route('menu')->with('success', 'Menu item created successfully');
    }

    public function create(UpdateFoodCartRequest $request)
    {
        // Retrieve all ingredients from the database

        // Create a new Menu instance
        $menu = new Menu();

        // Handle file upload
        if ($request->hasFile('foodcart')) {
            $path = $request->file('foodcart')->store('foodcarts', 'public');
            $menu->afbeelding = "/$path"; // Update this line
        }

        // Set other menu-related data
        $menu->naam = $request->input('soort');
        $menu->beschrijving = $request->input('beschrijving');

        // Assign the authenticated user to the menu
        $menu->user_id = auth()->user()->id;

        // Save the menu
        $menu->save();

        // Attach selected ingredients to the menu


        // Redirect or return a response as needed
        return redirect()->route('menu')->with('success', 'Menu item created successfully');
    }











}
