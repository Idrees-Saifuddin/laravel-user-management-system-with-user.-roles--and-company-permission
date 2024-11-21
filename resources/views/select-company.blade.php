
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Select Company') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <ul>
            <!-- @if(Auth::user()->hasHierarchicalPermissionTo('view dashboard'))
                <li>
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
            @endif -->

            
               
            
            
            <h1>Select Company</h1>
            <h3><?php echo session('active_company_id'); ?></h3>
            <form action="{{ route('company.select') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="company_id">Company</label>
                    <select name="company_id" id="company_id" class="form-control">
                        @foreach(Auth::user()->companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Select Company</button>
            </form>
            @if(Auth::user()->hasHierarchicalPermissionTo('view_users'))
                <a href="">
                    View Users
                </a>
            @endif
            <!-- Continue with other navigation items as needed -->
        </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
