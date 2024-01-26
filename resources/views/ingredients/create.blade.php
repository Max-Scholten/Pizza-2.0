<!-- resources/views/ingredients/create.blade.php -->

<x-nav-layout xmlns:X-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>
        Create Ingredient
    </x-slot:title>
    <div>
        <div class="text-3xl object-center">
            <h1>Create Ingredient</h1>
            <br>
        </div>
        <form action="{{ route('ingredients.store') }}" method="post">
            @csrf
            <div>
                <label for="topping">Topping:</label>
                <input type="text" name="topping" id="topping" required>
            </div>
            <div>
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" step="0.01" required>
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
</x-nav-layout>
