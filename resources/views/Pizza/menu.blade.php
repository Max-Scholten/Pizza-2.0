<x-nav-layout xmlns:X-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>
        Menu
    </x-slot:title>
    <div>
        <div class="text-3xl object-center">
            <h1>Stonks-Pizza menu</h1>
            <br>
            <div class='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-12 min-h-screen from-[#F9F5F3] via-[#F9F5F3] to-[#F9F5F3] bg-gradient-to-br px-2'>

                @foreach($pizzas as $pizza)
                    @if ($pizza->afbeelding !== null && $pizza->naam !== null && $pizza->beschrijving !== null)
                        <div class='w-full mb-4 h-full'>
                            <div class='bg-white rounded-3xl shadow-xl overflow-hidden h-full'>
                                <div class='h-[180px] md:h-[236px]'>
                                    <img class="w-full h-full object-cover" src="{{ asset("storage$pizza->afbeelding") }}" alt="Foto Pizza">
                                </div>

                                <div class='p-4 sm:p-6'>
                                    <p class='font-bold text-gray-700 text-[18px] leading-6 mb-1'>{{ $pizza->naam }}</p>
                                    <div class='flex flex-row'>
                                        <p class='text-[#3C3C4399] text-[15px] mr-2 line-through'>€ 15,-</p>
                                        <p class='text-[15px] font-bold text-[#0FB478]'>€ 12,50</p>
                                    </div>
                                    <p class='text-[#7C7C80] font-[13px] mt-4'>{{ $pizza->beschrijving }}</p>
                                    <a href="{{ route('cart.add', ['id' => $pizza->id]) }}" class='block mt-6 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[10px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                                        Bestellen (Small)
                                    </a>
                                    <!-- Inside the foreach loop in the Menu Blade Template -->
                                    <!-- Inside the foreach loop in the Menu Blade Template -->
                                    <a href="{{ route('Pizza.manager', ['id' => $pizza->id]) }}" class='block mt-1.5 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform rounded-[10px] hover:bg-[#F2ECE7] hover:text-[#000000dd] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                                        Edit Pizza
                                    </a>



                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-nav-layout>
