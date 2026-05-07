<x-app-layout>
    <div class="py-8 px-6">

        <!-- Header -->
        <h1 class="text-3xl font-bold text-white">
            Welcome, {{ Auth::user()->name }} 👋
        </h1>
        <p class="text-gray-500 dark:text-gray-400 mt-1">
            Manage your gym system easily
        </p>

        <!-- Cards Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">

            <!-- Membership Card -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 hover:scale-105 transition">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                    Memberships
                </h2>
                <p class="text-gray-500 mt-2">
                    View and manage membership plans
                </p>

                <a href="/memberships" 
                   class="inline-block mt-4 bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                    Manage
                </a>
            </div>

            <!-- Users Card (future) -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 opacity-80">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                    Users
                </h2>
                <p class="text-gray-500 mt-2">
                    Manage users (coming soon)
                </p>
            </div>

            <!-- Payments Card (future) -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 opacity-80">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                    Payments
                </h2>
                <p class="text-gray-500 mt-2">
                    Track payments (coming soon)
                </p>
            </div>

        </div>

        <!-- Quick Info -->
        <div class="mt-10 bg-white dark:bg-gray-800 shadow-md rounded-xl p-6">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                Quick Info
            </h2>

            <ul class="mt-4 text-gray-600 dark:text-gray-300 space-y-2">
                <li>✔ You are logged in successfully</li>
                <li>✔ You can manage memberships</li>
                <li>✔ More features coming soon</li>
            </ul>
        </div>

    </div>
</x-app-layout>