<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFoodCartRequest;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;

class FoodCartController extends Controller
{
    public function showMenu()
    {
        $pizzas = Menu::all();
        return view('Pizza.menu', compact('pizzas'));
    }
    public function store(MenuRequest $request)
    {
        Menu::create($request->validated()); // Mass assignment

        // Fetch updated menu data
        $pizzas = Menu::all();

        // Redirect to the menu page with the updated menu data
        return view('Pizza.menu', compact('pizzas'))->with('success', 'Menu item saved successfully');
    }


    public function create(UpdateFoodCartRequest $request)
    {
        // Create a new Menu instance
        $menu = new Menu();

        // Handle file upload
        if ($request->hasFile('foodcart')) {
            $path = $request->file('foodcart')->store('foodcarts');
            $menu->afbeelding = $path;
        }

        // Set other menu-related data
        $menu->naam = $request->input('soort');
        $menu->beschrijving = $request->input('beschrijving');

        // Assign the authenticated user to the menu
        $menu->user_id = auth()->id(); // Assuming you have a user_id column in your menus table

        // Save the menu
        $menu->save();

        return redirect(route('menu'))->with('Bericht', 'New food card');
    }





}
