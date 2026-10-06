<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tourism Staff
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="text-xl font-semibold mb-4">
                        Welcome Tourism Staff
                    </h3>

                    <p class="mb-6 text-gray-600">
                        Manage your tour-related activities from this dashboard.
                    </p>

                    <div class="flex gap-3">

                        <a href="#"
                           class="bg-blue-600 text-white px-5 py-2 rounded">
                            Manage Tour Packages
                        </a>

                        <a href="#"
                           class="bg-green-600 text-white px-5 py-2 rounded">
                            Manage Bookings
                        </a>

                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>