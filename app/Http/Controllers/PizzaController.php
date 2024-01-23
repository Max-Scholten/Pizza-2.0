<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
// Other actions...
    // PizzaController.php

// Add this method to handle editing a pizza
    public function edit($id)
    {
        $pizza = Pizza::findOrFail($id);
        return view('Pizza.edit', compact('pizza'));
    }

// Add this method to handle updating a pizza
    public function update(Request $request, $id)
    {
        $pizza = Pizza::findOrFail($id);
        // Validate the input data
        $request->validate([
            'naam' => 'required',
            'beschrijving' => 'required',
            'prijs' => 'required|numeric',
            // Add other validation rules as needed
        ]);

        // Update pizza details
        $pizza->update([
            'naam' => $request->input('naam'),
            'beschrijving' => $request->input('beschrijving'),
            'prijs' => $request->input('prijs'),
            // Update other fields as needed
        ]);

        // Redirect back to the menu or wherever appropriate
        return redirect()->route('menu')->with('success', 'Pizza updated successfully');
    }

}
