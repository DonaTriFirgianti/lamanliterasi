<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-purple-100">
        <div class="max-w-md w-full bg-pink-50 rounded-2xl shadow-md p-8 border border-purple-100">
            <h2 class="text-center text-2xl font-bold text-purple-600 mb-6">Login ke Akun</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-green-600 text-sm text-center" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-purple-700" />
                    <x-text-input id="email"
                        class="block mt-1 w-full border-purple-200 focus:border-pink-400 focus:ring-pink-200 rounded-xl"
                        type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-pink-600" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-purple-700" />
                    <x-text-input id="password"
                        class="block mt-1 w-full border-purple-200 focus:border-pink-400 focus:ring-pink-200 rounded-xl"
                        type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-pink-600" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-purple-300 text-pink-500 shadow-sm focus:ring-pink-400" name="remember">
                        <span class="ms-2 text-sm text-purple-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-purple-500 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="bg-pink-400 hover:bg-pink-500 text-white font-semibold rounded-xl px-4 py-2">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
