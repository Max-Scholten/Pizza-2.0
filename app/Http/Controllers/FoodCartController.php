<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFoodCartRequest;
use App\Models\Menu;
use Illuminate\Http\Request;

class FoodCartController extends Controller
{
        public function showmenu()
    {
        $pizzas = Menu::all();
        return view('Pizza.menu', compact('pizzas'));
    }

    // FoodCartController.php

    public function edit($id)
    {
        $pizza = Menu::findOrFail($id);
        return view('Menus.edit', compact('pizza'));
    }


    // FoodCartController.php

    public function update(UpdateFoodCartRequest $request, $id)
    {
        $menu = Menu::findOrFail($id);

        // Validate the input data
        $request->validate([
            'naam' => 'required',
            'beschrijving' => 'required',
            'prijs' => 'required',
        ]);

        // Update Menus item details
        $menu->update([
            'naam' => $request->input('naam'),
            'beschrijving' => $request->input('beschrijving'),
            'prijs' => $request->input('prijs'),
        ]);

        // Redirect back to the Menus or wherever appropriate
        return redirect()->route('manager')->with('success', 'Food Card updated successfully');
    }



    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string',
            'beschrijving' => 'required|string',
            'prijs' => 'required|numeric',
            'foodcart' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for the image
        ]);

        // Create a new Menus instance
        $menu = new Menu();

        // Handle file upload
        // Handle file upload
        if ($request->hasFile('foodcart')) {
            $path = $request->file('foodcart')->store('foodcarts', 'public');
            $menu->afbeelding = "/$path"; // Remove the '/storage' prefix
        }

        // Set other Menus-related data
        $menu->naam = $request->input('naam');
        $menu->beschrijving = $request->input('beschrijving');
        $menu->prijs = $request->input('prijs');

        // Assign the authenticated user to the Menus
        $menu->user_id = auth()->user()->id;

        // Save the Menus
        $menu->save();

        // Redirect or return a response as needed
        return redirect()->route('manager')->with('success', 'Food card created successfully.');
    }


    public function create(UpdateFoodCartRequest $request)
    {

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
    public function destroy($id)
    {
        // Find the Menus item by ID and delete it
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('manager')->with('success', 'Menus item deleted successfully');
    }
}
