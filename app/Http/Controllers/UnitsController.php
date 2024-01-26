<?php

// app/Http/Controllers/UnitsController.php

namespace App\Http\Controllers;

use App\Models\Units;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
// app/Http/Controllers/UnitsController.php

    public function index()
    {
        $units = Units::all();
        return view('units.index', compact('units'));
    }


    public function create()
    {
        return view('units.create');
    }

    // UnitsController.php
    // UnitsController.php
    public function store(Request $request)
    {
        $request->validate([
            'units' => 'required|string',
        ]);

        Units::create([
            'units' => $request->input('units'),
        ]);

        return redirect()->route('units.index')->with('success', 'Unit created successfully.');
    }


    public function edit($id)
    {
        $unit = Units::findOrFail($id);
        return view('units.edit', compact('unit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'units' => 'required|string',
        ]);

        $unit = Units::findOrFail($id);
        $unit->update([
            'units' => $request->input('units'),
        ]);

        return redirect()->route('units.index')->with('success', 'Unit updated successfully.');
    }

    public function destroy($id)
    {
        $unit = Units::findOrFail($id);
        $unit->delete();

        return redirect()->route('units.index')->with('success', 'Unit deleted successfully.');
    }
}
