<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-black shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST"
                      action="{{ route('admin.users.update', $user) }}">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium">Name</label>

                        <input type="text"
                               name="name"
                               value="{{ old('name', $user->name) }}"
                               class="w-full border rounded p-2"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Email</label>

                        <input type="email"
                               name="email"
                               value="{{ old('email', $user->email) }}"
                               class="w-full border rounded p-2"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">
                            New Password
                        </label>

                        <input type="password"
                               name="password"
                               class="w-full border rounded p-2">

                        <p class="text-sm text-gray-500 mt-1">
                            Leave blank if you do not want to change the password.
                        </p>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">
                            Confirm New Password
                        </label>

                        <input type="password"
                               name="password_confirmation"
                               class="w-full border rounded p-2">
                    </div>

                    <div class="mb-6">
                        <label class="block font-medium">Role</label>

                        <select name="role"
                                class="w-full border rounded p-2"
                                required>

                            <option value="Tourist"
                                {{ $user->role === 'Tourist' ? 'selected' : '' }}>
                                Tourist
                            </option>

                            <option value="Operator"
                                {{ $user->role === 'Operator' ? 'selected' : '' }}>
                                Tourism Staff
                            </option>

                            <option value="Admin"
                                {{ $user->role === 'Admin' ? 'selected' : '' }}>
                                Admin
                            </option>

                        </select>
                    </div>

                    <button type="submit"
                            class="bg-blue-600 text-black px-5 py-2 rounded">
                        Update User
                    </button>

                    <a href="{{ route('admin.users.index') }}"
                       class="ml-2 bg-gray-500 text-black px-5 py-2 rounded">
                        Cancel
                    </a>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>