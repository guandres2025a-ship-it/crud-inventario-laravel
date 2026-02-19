<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Olvide mi contraseña') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
            
            @if (Route::has('register'))
                <div class="mt-4 text-center">
                    <a class="text-sm text-gray-600 hover:text-premium-600 transition-colors duration-200" href="{{ route('register') }}">
                        {{ __('¿No tienes cuenta? Regístrate aquí') }}
                    </a>
                </div>
            @endif
        </form>

        <div class="mt-8 p-4 bg-gray-50 border border-gray-100 rounded-xl shadow-sm transition-all duration-300 hover:shadow-md">
            <div class="flex items-center mb-3">
                <div class="p-1.5 bg-premium-100 rounded-md mr-3">
                    <svg class="w-4 h-4 text-premium-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                </div>
                <h4 class="text-xs font-bold text-gray-700 uppercase tracking-wider">Acceso de Prueba</h4>
            </div>
            <div class="space-y-2">
                <div class="flex items-center text-sm">
                    <span class="text-gray-500 w-20">Email:</span>
                    <code class="text-premium-700 font-medium bg-white px-2 py-0.5 rounded border border-gray-100">arizaalvaro238@gmail.com</code>
                </div>
                <div class="flex items-center text-sm">
                    <span class="text-gray-500 w-20">Password:</span>
                    <code class="text-premium-700 font-medium bg-white px-2 py-0.5 rounded border border-gray-100">alvaro123</code>
                </div>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
