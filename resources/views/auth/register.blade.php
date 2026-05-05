<x-guest-layout>

    <!-- Registration Form -->
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- CSRF token for security -->

        <!-- NAME FIELD -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input 
                id="name" 
                class="block mt-1 w-full" 
                type="text" 
                name="name" 
                :value="old('name')" 
                placeholder="e.g. Lakindu Ransika" 
                required 
                autofocus 
                autocomplete="name" 
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!--EMAIL FIELD -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input 
                id="email"
                class="block mt-1 w-full" 
                type="email" 
                name="email" 
                :value="old('email')"
                placeholder="e.g. lakindu@gmail.com"
                required 
                autocomplete="username" 
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!--  PHONE FIELD  -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input 
                id="phone" 
                class="block mt-1 w-full" 
                type="text" 
                name="phone" 
                :value="old('phone')" 
                placeholder="e.g. 0765614545" 
            />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!--  AGE FIELD  -->
        <div class="mt-4">
            <x-input-label for="age" :value="__('Age')" />
            <x-text-input 
                id="age" 
                class="block mt-1 w-full" 
                type="number" 
                name="age" 
                :value="old('age')" 
                placeholder="e.g. 22"
            />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
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
                    placeholder="Enter a strong password"
                    required 
                    autocomplete="new-password" 
                />

                <!-- Toggle password visibility icon -->
                <span 
                    onclick="togglePassword('password', this)" 
                    class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer">
                    🔓
                </span>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!--  CONFIRM PASSWORD FIELD  -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <div class="relative">
                <x-text-input 
                    id="password_confirmation" 
                    class="block mt-1 w-full pr-10"
                    type="password"
                    name="password_confirmation"
                    placeholder="Re-enter your password"
                    required 
                    autocomplete="new-password" 
                />

                <!-- Toggle confirm password visibility icon -->
                <span 
                    onclick="togglePassword('password_confirmation', this)" 
                    class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer">
                    🔒
                </span>
            </div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!--  FORM ACTIONS  -->
        <div class="flex items-center justify-end mt-4">

            <!-- Link to login page -->
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" 
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <!-- Register button -->
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <!--  PASSWORD TOGGLE SCRIPT  -->
        <script>
            // Toggle password visibility for password fields
            function togglePassword(fieldId, icon) {
                const input = document.getElementById(fieldId);

                if (input.type === "password") {
                    input.type = "text";
                    icon.textContent = "🔓"; // visible
                } else {
                    input.type = "password";
                    icon.textContent = "🔒"; // hidden
                }
            }
        </script>

    </form>
</x-guest-layout>