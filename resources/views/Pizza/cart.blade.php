<!-- Pizza/cart.blade.php -->

<x-nav-layout xmlns:X-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>
        Cart
    </x-slot:title>
    <div>
        <div class="text-3xl object-center">
            <h1>Stonks-Pizza Cart</h1>
            <br>

            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <form action="{{ route('order.place') }}" method="post">
                @csrf
                <button type="submit">Place Order</button>
            </form>
        </div>
    </div>
</x-nav-layout>
