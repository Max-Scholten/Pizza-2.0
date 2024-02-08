<x-nav-layout xmlns:X-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>
        Menu
    </x-slot:title>
    <div>
        <div class="text-3xl object-center">
            <h1>Stonks-Pizza menu</h1>
            <br>
            <div
                class='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-12 min-h-screen from-[#F9F5F3] via-[#F9F5F3] to-[#F9F5F3] bg-gradient-to-br px-2 rounded-2xl'>
                @foreach($pizzas as $pizza)

                    <div class='w-full mb-4 p-8  h-98 '>
                        <div class='bg-white  rounded-3xl shadow-xl overflow-hidden h-fit'>
                            <div class=' md:h-fit'>
                                <img class="w-full h-80 object-cover" src="{{ asset("storage$pizza->afbeelding") }}"
                                     alt="Foto Pizza">
                            </div>
                            <div class='p-4 sm:p-6'>
                                <form method="post" action="{{ route('pizza.create') }}">
                                    @csrf
                                    <p class='font-bold text-gray-700 text-[18px] leading-6 mb-1'>{{ $pizza->naam }}</p>
                                    <div class='flex flex-row'>
                                        <p class='text-[15px] font-bold text-[#0FB478]'>€{{ $pizza->prijs }}</p>
                                    </div>
                                    <!-- Pizza Size Description -->
                                    <div class="overflow-y-auto max-h-28">
                                        <p class="text-[#7C7C80] font-[13px] mt-4" style="overflow-wrap: break-word;">
                                            {{ $pizza->beschrijving }}
                                        </p>
                                    </div>

                                    <!-- Pizza Size Dropdown -->
                                    <label class="block text-sm font-medium text-black mt-4">Select Pizza Size:
                                        <select name="pizza_size" class="form-input">
                                            @foreach($grotes as $grote)
                                                <option value="{{ $grote->id }}">{{ $grote->grote }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                    <!-- Ingredient Checkboxes -->
                                    <div class="mt-4 max-h-40 overflow-y-auto">
                                        <label class="block text-sm font-medium text-black">Select Ingredient:</label>
                                        @foreach($ingredients as $ingredient)
                                            <div class="flex items-center">
                                                <label>
                                                    <input type="checkbox" name="ingredients[]"
                                                           value="{{ $ingredient->id }}">
                                                </label>
                                                <span class="ml-2 text-black">{{ $ingredient->topping }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Order Button -->
                                    <button type="submit"
                                            class="bg-green-800 text-white px-4 py-2 rounded-lg mt-6 hover:bg-green-700 focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80">
                                        Plaats bestelling
                                    </button>
                                </form>
                                <!-- Edit Form -->

                                <!-- Delete Form -->
                                @role('employee')
                                <div class="mt-6">
                                    <a href="{{ route('menu.edit', ['id' => $pizza->id]) }}" class=" bg-yellow-400 text-white px-4 py-2 rounded-lg focus:outline-none focus:ring  focus:ring-opacity-80">
                                        Aanpassen
                                    </a>
                                </div>

                                <form method="post" action="{{ route('menu.destroy', $pizza->id) }}" class="mt-6">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300 focus:ring-opacity-80">
                                        Verwijderen
                                    </button>
                                </form>
                                @endrole
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</x-nav-layout>
