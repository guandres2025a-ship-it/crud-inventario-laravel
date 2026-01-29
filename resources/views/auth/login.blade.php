<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200 px-4">

        <div class="w-full max-w-lg bg-white rounded-2xl shadow-xl p-10">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <x-authentication-card-logo />
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">
                Welcome back
            </h2>
            <p class="text-sm text-center text-gray-500 mb-8">
                Sign in to manage your products
            </p>

            <x-validation-errors class="mb-4" />

            @session('status')
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ $value }}
            </div>
            @endsession

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <x-floating-input
                        type="email"
                        name="email"
                        label="Email address"
                        required />

                </div>

                <!-- Password -->
                <div>
                    <x-floating-input
                        type="password"
                        name="password"
                        label="Password"
                        required />

                </div>

                <!-- Remember -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center">
                        <x-checkbox name="remember" />
                        <span class="ml-2 text-gray-600">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                    <a
                        href="{{ route('password.request') }}"
                        class="text-blue-600 hover:underline">
                        Forgot password?
                    </a>
                    @endif
                </div>

                <!-- Submit -->
                <div class="pt-4">
                    <x-button class="w-full justify-center py-3 text-base">
                        Log in
                    </x-button>
                </div>
            </form>

            <!-- Register link -->
            <p class="text-center text-sm text-gray-600 mt-6">
                Don’t have an account?
                <a
                    href="{{ route('register') }}"
                    class="font-medium text-blue-600 hover:underline">
                    Sign up
                </a>
            </p>

        </div>
    </div>
</x-guest-layout>