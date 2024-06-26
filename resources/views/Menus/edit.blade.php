<x-nav-layout xmlns:X-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>
        Edit Pizza
    </x-slot:title>

    <div class='flex items-center justify-center min-h-screen from-[#F9F5F3] via-[#F9F5F3] to-[#F9F5F3] bg-gradient-to-br px-2'>
        <form action="{{ route('foodcart.update', ['id' => $pizza->id]) }}" method="post" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-12 min-h-screen from-[#F9F5F3] via-[#F9F5F3] to-[#F9F5F3] bg-gradient-to-br px-2">
            @csrf
            @method('PUT')

            <!-- Include form fields for editing pizza details -->
            <div class='w-full bg-center mb-4 h-full'>
                <div class='bg-white rounded-3xl shadow-xl overflow-hidden h-full'>
                    <div class='h-[180px] md:h-[236px]'>
                        <!-- Image Input and Preview -->
                        <label for="imageInput" class="block w-full h-full cursor-pointer">
                            <input type="file" id="imageInput" name="foodcart" class="hidden" accept="image/*">
                            <div id="preview" class="w-full h-full bg-cover bg-center" style="background-image: url('{{ asset("storage$pizza->afbeelding") }}')"></div>
                            <span class="block mt-2 text-sm text-gray-500">Change Image</span>
                        </label>
                    </div>
                    ORGANIZED
                    <div class='p-6 sm:p-8'>
                        <label for="naam">Name:</label>
                        <input type="text" name="naam" value="{{ $pizza->naam }}" required class="form-input">

                        <label for="beschrijving">Description:</label>
                        <textarea name="beschrijving" required class="form-input">{{ $pizza->beschrijving }}</textarea>

                        <label for="prijs">Price:</label>
                        <input type="number" name="prijs" value="{{ $pizza->prijs }}" required class="form-input">

                        <button type="submit" class='block mt-6 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[10px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                            Update Pizza
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Move the script to the end or to a separate file -->
    <script>
        document.getElementById('imageInput').addEventListener('change', function (e) {
            const preview = document.getElementById('preview');
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.style.backgroundImage = 'url(' + e.target.result + ')';
                }

                reader.readAsDataURL(file);
            } else {
                preview.style.backgroundImage = '';
            }
        });
    </script>
</x-nav-layout>
