<x-nav-layout xmlns:X-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>
        Winkelwagen
    </x-slot:title>
    <div>
        <div class="text-3xl object-center">
            <h1>Stonks-Pizza Winkelwagen</h1>
            <br>
        </div>
    </div>
    <!-- Main Content -->
    <div class="grid grid-cols-1 gap-8 min-h-screen from-[#F9F5F3] via-[#F9F5F3] to-[#F9F5F3] bg-gradient-to-br px-2 rounded-2xl">
        <!-- Pizza Items -->
        @php
            $totalPrice = 0; // Initialize total price variable
        @endphp

        @foreach($carts as $cart)
            <div class="flex bg-yellow-50 rounded-3xl shadow-xl p-8">
                <!-- Pizza Details -->
                <div class="ml-4 bg">
                    <!-- Pizza Image -->
                    <img src="/storage/{{ $cart->menu->afbeelding }}" alt="Pizza Image" class="h-72 object-cover rounded">

                    <!-- Pizza Name -->
                    <p class='font-bold text-gray-700 text-[18px] leading-6 mb-1'>{{ $cart->menu->naam }}</p><br>

                    <!-- Pizza Price -->
                    <div class='flex flex-row'>
                        <p class='text-[15px] font-bold text-[#0FB478]'>€{{ $cart->menu->prijs }}</p><br>
                    </div>

                    <!-- Pizza Description -->
                    <div class="overflow-y-auto max-h-28">
                        <p class="text-[#7C7C80] text-[30px] font-serif mt-16" style="overflow-wrap: break-word;">
                            {{ $cart->menu->beschrijving }}
                        </p>
                    </div>
                </div>
            </div>
            @php
                $totalPrice += $cart->menu->prijs ; // Accumulate the price of each cart item
            @endphp
        @endforeach

        <!-- Total Price -->
        <div class="text-left mt-8 text-green-600">
            <h2 class="text-2xl font-semibold">Total Price: €{{ $totalPrice }}</h2>
        </div>
    </div>
</x-nav-layout>
