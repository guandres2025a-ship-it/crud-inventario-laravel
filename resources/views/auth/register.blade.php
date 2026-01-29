<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200 px-4">

        <div class="w-full max-w-lg bg-white rounded-2xl shadow-xl p-10">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <x-authentication-card-logo />
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">
                Create your account
            </h2>
            <p class="text-sm text-center text-gray-500 mb-8">
                Register to start managing your products
            </p>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <x-floating-input
                    name="name"
                    label="Full name"
                    required />

                <!-- Email -->
                <x-floating-input
                    type="email"
                    name="email"
                    label="Email address"
                    required />

                <!-- Password -->
                <x-floating-input
                    type="password"
                    name="password"
                    label="Password"
                    required />

                <!-- Confirm Password -->
                <x-floating-input
                    type="password"
                    name="password_confirmation"
                    label="Confirm password"
                    required />

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="pt-2">
                    <label class="flex items-start gap-3 text-sm text-gray-600">
                        <x-checkbox name="terms" required />
                        <span>
                            I agree to the
                            <a target="_blank" href="{{ route('terms.show') }}"
                                class="text-blue-600 hover:underline font-medium">
                                Terms of Service
                            </a>
                            and
                            <a target="_blank" href="{{ route('policy.show') }}"
                                class="text-blue-600 hover:underline font-medium">
                                Privacy Policy
                            </a>
                        </span>
                    </label>
                </div>
                @endif

                <!-- Submit -->
                <div class="pt-4">
                    <x-button class="w-full justify-center py-3 text-base">
                        Register
                    </x-button>
                </div>
            </form>

            <!-- Login link -->
            <p class="text-center text-sm text-gray-600 mt-6">
                Already have an account?
                <a
                    href="{{ route('login') }}"
                    class="font-medium text-blue-600 hover:underline">
                    Log in
                </a>
            </p>

        </div>
    </div>
</x-guest-layout>