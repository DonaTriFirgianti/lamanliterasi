<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-purple-100">
        <div class="max-w-md w-full bg-pink-50 rounded-2xl shadow-md p-8 border border-purple-100">

            <h2 class="text-center text-2xl font-bold text-purple-600 mb-4">
                Lupa Password
            </h2>

            <p class="text-sm text-purple-700 mb-6 text-center">
                {{ __('Tidak masalah. Masukkan email Anda dan kami akan mengirimkan tautan untuk mengatur ulang password.') }}
            </p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-green-600 text-sm text-center" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-purple-700" />
                    <x-text-input id="email"
                        class="block mt-1 w-full border-purple-200 focus:border-pink-400 focus:ring-pink-200 rounded-xl"
                        type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-pink-600" />
                </div>

                <div class="flex items-center justify-end mt-6">
                    <x-primary-button class="bg-pink-400 hover:bg-pink-500 text-white font-semibold rounded-xl px-4 py-2">
                        {{ __('Kirim Link Reset Password') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
