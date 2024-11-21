<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //
    public function index()
    {
        $companies = Company::all();
        $roles = Role::all();
        $permissions = Permission::all();
        $users = User::all();
        return view('permissions.index', compact('companies', 'roles', 'permissions', 'users'));
    }

    public function storeCompanyPermission(Request $request)
    {
        $company = Company::find($request->company_id);
        $company->permissions()->sync($request->permissions);
        return back()->with('success', 'Permissions updated for company.');
    }

    public function storeRolePermission(Request $request)
    {
        $role = Role::find($request->role_id);
        $role->permissions()->sync($request->permissions);
        return back()->with('success', 'Permissions updated for role.');
    }

    public function storeUserPermission(Request $request)
    {
        $user = User::find($request->user_id);
        $user->syncPermissions($request->permissions);
        return back()->with('success', 'Permissions updated for user.');
    }
}
