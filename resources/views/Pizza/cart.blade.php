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
                    <img class="w-full h-80 object-cover" src="/storage/{{ $cart->menu->afbeelding }}" alt="Pizza Image">
                </div>
                <!-- Pizza Details -->
                <div class="ml-4 bg">
                    <!-- Pizza Name -->
                    <p class='font-bold text-gray-700 text-[18px] leading-6 mb-1'>{{ $cart->menu->naam }}</p><br>
                    <!-- Pizza Size -->
                    <p class='font-bold text-gray-700 text-[18px] leading-6 mb-1'>Size: {{ $cart->grote }}</p><br>
                    <!-- Pizza Ingredients -->
                    <p class='font-bold text-gray-700 text-[18px] leading-6 mb-1'> Extra Ingredients: {{ ($cart->ingredients) }}</p>
                    <!-- Pizza Status bestelling -->
                    <p class="font-bold text-gray-700 text-[18px] leading-6 mb-1">Status: {{ $cart->status->status }}</p>


                    <!-- Pizza Description -->
                    <div class="overflow-y-auto  ">
                        <p class="text-[#7C7C80] text-[30px] font-serif mt-16" style="overflow-wrap: break-word;">
                            {{ $cart->menu->beschrijving }}
                        </p>
                    </div>
                    <!-- Pizza Price -->
                    <div class='flex flex-row'>
                        <p class='text-[15px] font-bold text-[#0FB478]'>€{{ $cart->prijs }}</p><br>
                    </div>

                    <form method="post" action="{{ route('cart.delete', ['orderId' => $cart->id]) }}" class="mt-6">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300 focus:ring-opacity-80">
                            Delete Order
                        </button>
                    </form>
                </div>
            </div>

            @php
                $totalPrice += $cart->prijs ; // Accumulate the price of each cart item
            @endphp
        @endforeach

        <!-- Total Price -->
        <div class="text-left mt-8 text-green-600">
            <h2 class="text-2xl font-semibold">Total Price: €{{ $totalPrice }}</h2>
        </div>
    </div>
</x-nav-layout>
