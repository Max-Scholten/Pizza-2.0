<!-- resources/views/units/edit.blade.php -->

<x-nav-layout xmlns:X-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>
        Edit Unit
    </x-slot:title>
    <div>
        <div class="text-3xl object-center">
            <h1>Edit Unit</h1>
            <br>
        </div>
        <form method="POST" action="{{ route('units.update', $unit->id) }}">
            @csrf
            @method('PUT')
            <label for="unit">Unit:</label>
            <input type="text" id="unit" name="unit" value="{{ $unit->units }}" required>
            <button type="submit">Update</button>
        </form>
    </div>
</x-nav-layout>
