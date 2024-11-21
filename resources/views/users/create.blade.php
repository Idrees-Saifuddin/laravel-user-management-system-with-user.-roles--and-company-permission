
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create User') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-md rounded-lg">
                    <div class="p-6">
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700">Name</label>
                                <input type="text" name="name" id="name" class="input" required>
                                @error('name')<span class="text-red-600">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-gray-700">Email</label>
                                <input type="email" name="email" id="email" class="input" required>
                                @error('email')<span class="text-red-600">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="block text-gray-700">Password</label>
                                <input type="password" name="password" id="password" class="input" required>
                                @error('password')<span class="text-red-600">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="role_id" class="block text-gray-700">Role</label>
                                <select name="role_id" id="role_id" class="input" required>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')<span class="text-red-600">{{ $message }}</span>@enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Create User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

