<x-nav-layout xmlns:X-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>
        Unit List
    </x-slot:title>
    <div>
        <div class="text-3xl object-center">
            <h1>Unit List</h1>
            <br>
        </div>
        <a href="{{ route('units.create') }}">Create New Unit</a>

        {{-- Dump the data for debugging --}}


        <table>
            <thead>
            <tr>
                <th>Unit</th>
            </tr>
            </thead>
            <tbody>
            {{-- Loop through units and display --}}
            @foreach ($units as $unit)

                <tr>
                    <td>{{ $unit->id }}</td>
                    <td>{{ $unit->units}}</td>
                    <td>
                        <a href="{{ route('units.edit', $unit->id) }}">Edit</a>
                        <form method="POST" action="{{ route('units.destroy', $unit->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</x-nav-layout>
