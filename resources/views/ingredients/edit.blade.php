<x-nav-layout xmlns:X-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>
        Edit Ingredient
    </x-slot:title>
    <div>
        <div class="text-3xl object-center">
            <h1>Edit Ingredient</h1>
            <br>
        </div>
        <form action="{{ route('ingredients.update', $ingredient->id) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <label for="topping">Topping:</label>
                <input type="text" name="topping" id="topping" value="{{ $ingredient->topping }}" required>
            </div>
            <div>
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" step="0.01" value="{{ $ingredient->price }}" required>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</x-nav-layout>
