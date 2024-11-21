<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the companies associated with the user.
     */
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_user');
    }

    /**
     * Get the roles associated with the user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function scopeRole($query, $roleId)
    {
        return $query->where('role_id', $roleId);
    }
    
    /**
     * Set the active company for the user.
     *
     * @param int $companyId
     */
    public function setActiveCompany($companyId)
    {
        session(['active_company_id' => $companyId]);
    }

    /**
     * Get the active company for the user.
     *
     * @return \App\Models\Company|null
     */
    public function getActiveCompany()
    {
        return $this->companies()->where('companies.id', session('active_company_id'))->first();
    }

    /**
     * Check if the user has hierarchical permission for a specific action.
     *
     * @param string $permission
     * @return bool
     */
    public function hasHierarchicalPermissionTo($permission)
    {
        $company = $this->getActiveCompany();
        if (!$company) {
            return false;
        }

        // Check company permission
        if (!$company->hasPermissionTo($permission)) {
            return false;
        }

        // Check role permission
        $roleHasPermission = $this->roles()->whereHas('permissions', function ($query) use ($permission) {
            $query->where('name', $permission);
        })->exists();

        // Check user permission
        $userHasPermission = $this->permissions()->where('name', $permission)->exists();

        return $roleHasPermission || $userHasPermission;
    }
    public function can($ability, $arguments = [])
    {
        return $this->hasHierarchicalPermissionTo($ability);
    }
}
