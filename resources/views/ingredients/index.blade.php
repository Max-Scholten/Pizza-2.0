<!-- resources/views/ingredients/index.blade.php -->

<x-nav-layout xmlns:X-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>
        Ingredients Lijst
    </x-slot:title>
    <div>
        <div class="text-3xl object-center">
            <h1>Ingredients Lijst</h1>
            <br>
            <a href="{{ route('ingredients.create') }}">Create New Ingredients</a>
        </div>
        <table>
            <thead>
            <tr>
                <th>Topping</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <!-- resources/views/ingredients/index.blade.php -->

            @foreach ($ingredients as $ingredient)
                <tr>
                    <td>{{ $ingredient->topping }}</td>
                    <td>€{{ $ingredient->price }}</td>
                    <td>
                        <a href="{{ route('ingredients.edit', $ingredient->id) }}">Edit</a><br>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('ingredients.destroy', $ingredient->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this ingredient?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</x-nav-layout>
