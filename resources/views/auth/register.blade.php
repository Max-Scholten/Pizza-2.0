<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="naam" :value="__('Naam')" />
            <x-text-input id="naam" class="block mt-1 w-full" type="text" name="naam" :value="old('naam')" required autofocus autocomplete="naam" />
            <x-input-error :messages="$errors->get('naam')" class="mt-2" />
        </div>
        <!-- Straat -->
        <div class="mt-4">
            <x-input-label for="straat" :value="__('Straat')" />
            <x-text-input id="straat" class="block mt-1 w-full" type="text" name="straat" :value="old('straat')" />
            <x-input-error :messages="$errors->get('straat')" class="mt-2" />
        </div>
        <!-- Huisnummer -->
        <div class="mt-4">
            <x-input-label for="huisnummer" :value="__('Huisnummer')" />
            <x-text-input id="huisnummer" class="block mt-1 w-full" type="text" name="huisnummer" :value="old('huisnummer')" />
            <x-input-error :messages="$errors->get('huisnummer')" class="mt-2" />
        </div>

        <!-- Woonplaats -->
        <div class="mt-4">
            <x-input-label for="woonplaats" :value="__('Woonplaats')" />
            <x-text-input id="woonplaats" class="block mt-1 w-full" type="text" name="woonplaats" :value="old('woonplaats')" />
            <x-input-error :messages="$errors->get('woonplaats')" class="mt-2" />
        </div>

        <!-- Telephone -->
        <div class="mt-4">
            <x-input-label for="tel" :value="__('Telephone')" />
            <x-text-input id="tel" class="block mt-1 w-full" type="tel" name="tel" :value="old('tel')" />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
