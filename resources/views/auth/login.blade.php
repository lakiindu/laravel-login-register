<x-guest-layout>

    <!--  SESSION STATUS MESSAGE  -->
    <!-- Displays login success / error / status messages -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!--  LOGIN FORM  -->
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- CSRF token for security protection -->

        <!--  EMAIL FIELD  -->
        <div>
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input 
                id="email"
                class="block mt-1 w-full" 
                type="email" 
                name="email"
                :value="old('email')"
                placeholder="lakindu@gmail.com" 
                required 
                autofocus 
                autocomplete="username" 
            />

            <!-- Email validation error message -->
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!--  PASSWORD FIELD  -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <div class="relative">

                <x-text-input 
                    id="password" 
                    class="block mt-1 w-full pr-10"
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required 
                    autocomplete="current-password" 
                />

                <!-- Toggle password visibility icon -->
                <span 
                    onclick="togglePassword('password', this)" 
                    class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer text-lg">
                    🔓
                </span>

            </div>

            <!-- Password validation error message -->
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!--  REMEMBER ME CHECKBOX  -->
        <div class="block mt-4">

            <label for="remember_me" class="inline-flex items-center">

                <!-- Checkbox to keep user logged in -->
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" 
                    name="remember"
                >

                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Remember me') }}
                </span>

            </label>

        </div>

        <!--  FORM ACTIONS  -->
        <div class="flex items-center justify-end mt-4">

            <!-- Forgot password link (only shows if route exists) -->
            @if (Route::has('password.request'))
                <a 
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" 
                    href="{{ route('password.request') }}"
                >
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <!-- Login button -->
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>

        </div>

        <!--  PASSWORD TOGGLE SCRIPT  -->
        <script>
            // Toggle password visibility (show/hide password)
            function togglePassword(fieldId, icon) {
                const input = document.getElementById(fieldId);

                if (input.type === "password") {
                    input.type = "text";
                    icon.textContent = "🔓"; // password visible
                } else {
                    input.type = "password";
                    icon.textContent = "🔒"; // password hidden
                }
            }
        </script>

    </form>
</x-guest-layout>