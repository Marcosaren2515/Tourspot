<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Admin Dashboard -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">

                <div class="p-6 text-gray-900">

                    <h3 class="text-xl font-semibold mb-4">
                        Welcome Admin!
                    </h3>

                    <a href="{{ route('admin.users.index') }}"
                       class="inline-block bg-blue-600 text-Black px-5 py-2 rounded">
                        User Management
                    </a>

                </div>

            </div>
                <h3 class="text-xl font-semibold mb-4">
 

            <!-- Weather -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <div class="flex items-center justify-between mb-6">

                        <h3 class="text-xl font-semibold">
                            Current Weather
                        </h3>

                        <a href="{{ route('admin.dashboard') }}"
                           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Refresh Weather
                        </a>

                    </div>

                    @if ($weather)

                        <div class="space-y-3">

                            <p>
                                <strong>Location:</strong>
                                {{ $weather['location'] }}
                            </p>

                            <p>
                                <strong>Temperature:</strong>
                                {{ $weather['temperature'] }} °C
                            </p>

                            <p>
                                <strong>Weather Condition:</strong>
                                {{ ucfirst($weather['condition']) }}
                            </p>

                            <p>
                                <strong>Humidity:</strong>
                                {{ $weather['humidity'] }}%
                            </p>

                            <p>
                                <strong>Wind Speed:</strong>
                                {{ $weather['wind_speed'] }} m/s
                            </p>

                        </div>

                    @else

                        <p class="text-red-600">
                            {{ $weatherError ?? 'Weather information is currently unavailable.' }}
                        </p>

                    @endif

                </div>

            </div>

        </div>

    </div>

</x-app-layout>