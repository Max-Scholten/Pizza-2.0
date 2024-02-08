<x-nav-layout xmlns:X-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>
        Cart
    </x-slot:title>
    <div>
        <div class="text-3xl object-center">
            <h1>Stonks-Pizza cart</h1>
            <br>
        </div>
    </div>
    <!-- Main Content -->
    <div class="grid grid-cols-1 gap-8 min-h-screen from-[#F9F5F3] via-[#F9F5F3] to-[#F9F5F3] bg-gradient-to-br px-2 rounded-2xl">
        <!-- Pizza Items -->
        @foreach($carts as $cart)
            <div class="flex bg-white rounded-3xl shadow-xl p-8">
                <!-- Pizza Image -->
                <div class='bg-white rounded-3xl shadow-xl overflow-hidden h-fit'>
                    <img class="w-full h-80 object-cover" src="{{ asset("storage$cart->afbeelding") }}" alt="Foto Pizza">
                </div>
                <!-- Pizza Details -->
                <div class="ml-4">
                    <!-- Pizza Name -->
                    <p class='font-bold text-gray-700 text-[18px] leading-6 mb-1'>{{ $cart->naam }}</p>
                    <!-- Pizza Price -->
                    <div class='flex flex-row'>
                        <p class='text-[15px] font-bold text-[#0FB478]'>€{{ $cart->prijs }}</p>
                    </div>
                    <!-- Pizza Description -->
                    <div class="overflow-y-auto max-h-28">
                        <p class="text-[#7C7C80] font-[13px] mt-4" style="overflow-wrap: break-word;">
                            {{ $cart->beschrijving }}
                        </p>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</x-nav-layout>
