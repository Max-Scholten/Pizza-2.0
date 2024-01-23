<x-nav-layout xmlns:X-slot="http://www.w3.org/1999/xlink">
    <x-slot:title>
        Manager
    </x-slot:title>
    <div>
        <div class="text-3xl object-center">
            <h1>Manager Create Food card</h1>
            <br>
        </div>
    </div>

    <div class='flex items-center justify-center min-h-screen from-[#F9F5F3] via-[#F9F5F3] to-[#F9F5F3] bg-gradient-to-br px-2'>


        @csrf
            @method('POST')

            <div class='flex items-center justify-center min-h-screen from-[#F9F5F3] via-[#F9F5F3] to-[#F9F5F3] bg-gradient-to-br px-2'>
                <form action="{{ route('foodcard.create') }}" method="post" enctype="multipart/form-data" id="uploadForm">
                    @csrf
                    @method('POST')
                    <div class='w-full max-w-md mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
                        <div class='max-w-md mx-auto'>
                            <div class='h-[236px]'></div>
                            <div id="preview" class='h-[236px]' style='background-size: cover; background-position: center'></div>
                            <label for="foodcart">Upload Food Card Image:</label>
                            <input type="file" name="foodcart" accept="image/*" id="imageInput">
                            <div class='p-4 sm:p-6'>
                                <div class="font-bold text-gray-700 text-[22px] leading-7 mb-1">
                                    <label for="soort" class="block text-sm font-medium text-black">Soort</label>
                                    <input type="text" id="soort" name="soort" class="form-input">
                                </div>
                                <div class="text-[#7C7C80] font-[15px] mt-6">
                                    <label for="beschrijving" class="block text-sm font-medium text-black">Beschrijving</label>
                                    <input type="text" id="beschrijving" name="beschrijving" class="form-input">
                                </div>
                                <button type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>

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
            </div>
    </div>

</x-nav-layout>
