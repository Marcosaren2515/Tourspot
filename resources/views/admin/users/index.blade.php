<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Management
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 bg-green-100 text-green-800 p-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <div class="mb-6">
                    <a href="{{ route('admin.users.create') }}"
                       class="bg-blue-600 text-black px-4 py-2 rounded">
                        Add User
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2 text-left">ID</th>
                                <th class="border px-4 py-2 text-left">Name</th>
                                <th class="border px-4 py-2 text-left">Email</th>
                                <th class="border px-4 py-2 text-left">Role</th>
                                <th class="border px-4 py-2 text-left">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="border px-4 py-2">
                                        {{ $user->id }}
                                    </td>

                                    <td class="border px-4 py-2">
                                        {{ $user->name }}
                                    </td>

                                    <td class="border px-4 py-2">
                                        {{ $user->email }}
                                    </td>

                                    <td class="border px-4 py-2">
                                        @if ($user->role === 'Operator')
                                            Tourism Staff
                                        @else
                                            {{ $user->role }}
                                        @endif
                                    </td>

                                    <td class="border px-4 py-2">
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                           class="bg-yellow-500 text-black px-3 py-1 rounded">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.users.destroy', $user) }}"
                                              method="POST"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="bg-red-600 text-black px-3 py-1 rounded"
                                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>