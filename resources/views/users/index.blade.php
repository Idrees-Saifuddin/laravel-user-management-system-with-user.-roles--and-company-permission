<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg">
                <div class="p-6">
                    @if(Auth::user()->hasHierarchicalPermissionTo('create_users'))
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
                    @endcan
                    <table class="table-auto w-full mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Role</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="border px-4 py-2">{{ $user->name }}</td>
                                    <td class="border px-4 py-2">{{ $user->email }}</td>
                                    <td class="border px-4 py-2">
                                        @if($user->roles->isEmpty())
                                            N/A
                                        @else
                                            @foreach($user->roles as $role)
                                                <span class="badge">{{ $role->name }}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">
                                        @if(Auth::user()->hasHierarchicalPermissionTo('edit_users'))
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                        @endcan
                                        @if(Auth::user()->hasHierarchicalPermissionTo('delete_users'))
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        @endcan
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
