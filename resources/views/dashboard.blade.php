<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <ul>
            <!-- @if(Auth::user()->hasHierarchicalPermissionTo('view dashboard'))
                <li>
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
            @endif -->

            @if(Auth::user()->hasHierarchicalPermissionTo('view inventory'))
                <li>
                    <a href="{{ route('inventory.index') }}">Inventory</a>
                    <ul>
                        @if(Auth::user()->hasHierarchicalPermissionTo('create product'))
                            <li>
                                <a href="{{ route('inventory.create') }}">Create Inventory</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

           

            <!-- Continue with other navigation items as needed -->
        </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
