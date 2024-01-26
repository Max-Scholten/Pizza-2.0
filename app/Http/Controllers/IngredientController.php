<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientController extends Controller
{

    public function index()
    {
        $ingredients = Ingredient::all();
        return view('ingredients.index', compact('ingredients'));
    }

    public function create()
    {
        return view('ingredients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'topping' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Ingredient::create([
            'topping' => $request->input('topping'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('ingredients.create')->with('success', 'Ingredient created successfully.');
    }
    public function edit($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        return view('ingredients.edit', compact('ingredient'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'topping' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $ingredient = Ingredient::findOrFail($id);
        $ingredient->update([
            'topping' => $request->input('topping'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('ingredients.index')->with('success', 'Ingredient updated successfully.');
    }

    public function destroy($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();

        return redirect()->route('ingredients.index')->with('success', 'Ingredient deleted successfully.');
    }
}
