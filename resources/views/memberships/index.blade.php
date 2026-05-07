<x-app-layout>
    <div class="p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-white tracking-wide">
                Membership Plans 💪
            </h1>

            <a href="/memberships/create"
               class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-2 rounded-lg shadow-md hover:from-blue-700 hover:to-indigo-700 transition">
                + Add Membership
            </a>
        </div>

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($memberships as $m)
                <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl p-6 hover:scale-105 hover:shadow-2xl transition duration-300">

                    <!-- Title -->
                    <h2 class="text-xl font-bold text-indigo-600 dark:text-indigo-400">
                        {{ $m->name }}
                    </h2>

                    <!-- Description -->
                    <p class="text-gray-600 dark:text-gray-300 mt-2 text-sm leading-relaxed">
                        {{ $m->description ?? 'No description available' }}
                    </p>

                    <!-- Price -->
                    <p class="text-3xl font-extrabold text-green-500 mt-4">
                        Rs. {{ $m->price }}
                    </p>

                    <!-- Actions -->
                    <div class="flex flex-wrap gap-3 mt-5">

                        <!-- Edit -->
                        <a href="/memberships/{{ $m->id }}/edit"
                           class="bg-yellow-500 text-white px-4 py-1.5 rounded-md shadow hover:bg-yellow-600 transition">
                            ✏️ Edit
                        </a>

                        <!-- Delete -->
                        <form action="/memberships/{{ $m->id }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="bg-red-500 text-white px-4 py-1.5 rounded-md shadow hover:bg-red-600 transition">
                                🗑 Delete
                            </button>
                        </form>

                        <!-- Join -->
                        <form method="POST" action="/join-membership/{{ $m->id }}">
                            @csrf

                            <button type="submit"
                                class="bg-green-500 text-white px-4 py-1.5 rounded-md shadow hover:bg-green-600 transition">
                                Join
                            </button>
                        </form>

                    </div>

                </div>
            @endforeach

        </div>

    </div>
</x-app-layout>