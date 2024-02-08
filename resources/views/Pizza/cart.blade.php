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
                <!-- Pizza Image -->
                <div class='bg-re rounded-3xl shadow-xl overflow-hidden h-fit'>
                    <img class="w-full h-80 object-cover" src="{{ asset("storage$cart->afbeelding") }}" alt="Foto Pizza">
                </div>
                <!-- Pizza Details -->
                <div class="ml-4 bg">
                    <!-- Pizza Name -->
                    <p class='font-bold text-gray-700 text-[18px] leading-6 mb-1'>{{ $cart->naam }}</p><br>
                    <!-- Pizza Price -->
                    <div class='flex flex-row'>
                        <p class='text-[15px] font-bold text-[#0FB478]'>€{{ $cart->prijs }}</p><br>
                    </div>
                    <!-- Pizza Description -->
                    <div class="overflow-y-auto max-h-28 ">
                        <p class="text-[#7C7C80] text-[30px] font-serif mt-16" style="overflow-wrap: break-word;">
                            {{ $cart->beschrijving }}
                        </p>
                    </div>
                </div>
            </div>
            @php
                $totalPrice += $cart->prijs; // Accumulate the price of each cart item
            @endphp
        @endforeach
        <!-- Total Price -->
        <div class="text-left mt-8 text-green-600">
            <h2 class="text-2xl font-semibold">Total Price: €{{ $totalPrice }}</h2>
        </div>
    </div>
</x-nav-layout>
