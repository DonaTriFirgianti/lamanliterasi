<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-purple-100">
        <div class="max-w-md w-full bg-pink-50 rounded-2xl shadow-md p-8 border border-purple-100">
            <h2 class="text-center text-2xl font-bold text-purple-600 mb-6">Daftar Akun Baru</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-purple-700" />
                    <x-text-input id="name"
                        class="block mt-1 w-full border-purple-200 focus:border-pink-400 focus:ring-pink-200 rounded-xl"
                        type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-pink-600" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="text-purple-700" />
                    <x-text-input id="email"
                        class="block mt-1 w-full border-purple-200 focus:border-pink-400 focus:ring-pink-200 rounded-xl"
                        type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-pink-600" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-purple-700" />
                    <x-text-input id="password"
                        class="block mt-1 w-full border-purple-200 focus:border-pink-400 focus:ring-pink-200 rounded-xl"
                        type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-pink-600" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')"
                        class="text-purple-700" />
                    <x-text-input id="password_confirmation"
                        class="block mt-1 w-full border-purple-200 focus:border-pink-400 focus:ring-pink-200 rounded-xl"
                        type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-pink-600" />
                </div>

                <div class="flex items-center justify-between mt-6">
                    <a class="text-sm text-purple-500 hover:underline" href="{{ route('login') }}">
                        {{ __('Sudah punya akun?') }}
                    </a>

                    <x-primary-button
                        class="bg-pink-400 hover:bg-pink-500 text-white font-semibold rounded-xl px-4 py-2">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>