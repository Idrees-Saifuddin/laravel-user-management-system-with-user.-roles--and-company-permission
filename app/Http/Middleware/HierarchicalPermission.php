<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class HierarchicalPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $permission)
    {
        // $user = Auth::user();
        // $company = $user->companies()->first();

        // if ($company && $company->hasPermissionTo($permission)) {
        //     return $next($request);
        // }

        // if ($user->hasPermissionTo($permission)) {
        //     return $next($request);
        // }

        // return redirect()->route('dashboard')->withErrors('You do not have permission to perform this action.');
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $company = $user->getActiveCompany();

        if (!$company || !$user->hasHierarchicalPermissionTo($permission)) {
            return redirect()->route('dashboard')->withErrors('You do not have permission to perform this action.');
        }

        return $next($request);
    }
}
