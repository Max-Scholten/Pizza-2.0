<x-nav-layout xmlns:X-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>
        Cart
    </x-slot:title>
    <div>
        <div class="text-3xl object-center">
            <h1>Stonks-Pizza menu</h1>
            <br>
            <div class='flex items-center justify-center min-h-screen from-[#F9F5F3] via-[#F9F5F3] to-[#F9F5F3] bg-gradient-to-br px-2'>

                @foreach($pizzas as $pizza)


                    <div class='w-full max-w-md mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
                        <div class='max-w-md mx-auto'>
                            <div class='h-[236px]' style='background-image: url(data:image/jpeg;base64,{{ base64_encode($pizza->afbeelding) }}); background-size: cover; background-position: center'></div>

                            <div class='p-4 sm:p-6'>
                                <p class='font-bold text-gray-700 text-[22px] leading-7 mb-1'>{{ $pizza->naam }}</p>
                                <div class='flex flex-row'>
                                    <p class='text-[#3C3C4399] text-[17px] mr-2 line-through'>€ 15,-</p>
                                    <p class='text-[17px] font-bold text-[#0FB478]'>€ 12,50</p>
                                </div>
                                <p class='text-[#7C7C80] font-[15px] mt-6'>{{ $pizza->beschrijving }}</p>
                                <a href="#" class='block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[14px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                                    Bestellen
                                </a>
                                <a target='_blank' href="#" class='block mt-1.5 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform rounded-[14px] hover:bg-[#F2ECE7] hover:text-[#000000dd] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                                    Placeholder app
                                </a>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
</x-nav-layout>
