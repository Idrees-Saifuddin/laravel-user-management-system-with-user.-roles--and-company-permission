<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Permissions</title>
</head>
<body>
    <h1>Manage Permissions</h1>

    <h2>Company Permissions</h2>
    <form action="{{ route('permissions.store.company') }}" method="POST">
        @csrf
        <select name="company_id">
            @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
        <select name="permissions[]" multiple>
            @foreach($permissions as $permission)
                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
            @endforeach
        </select>
        <button type="submit">Update Company Permissions</button>
    </form>

    <h2>Role Permissions</h2>
    <form action="{{ route('permissions.store.role') }}" method="POST">
        @csrf
        <select name="role_id">
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
        <select name="permissions[]" multiple>
            @foreach($permissions as $permission)
                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
            @endforeach
        </select>
        <button type="submit">Update Role Permissions</button>
    </form>

    <h2>User Permissions</h2>
    <form action="{{ route('permissions.store.user') }}" method="POST">
        @csrf
        <select name="user_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <select name="permissions[]" multiple>
            @foreach($permissions as $permission)
                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
            @endforeach
        </select>
        <button type="submit">Update User Permissions</button>
    </form>
</body>
</html>
