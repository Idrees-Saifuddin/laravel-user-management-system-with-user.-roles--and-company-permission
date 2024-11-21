<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Company extends Model
{
    
    use HasFactory, HasRoles;

    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'company_user');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'company_permissions');
    }

    public function hasPermissionTo($permission)
    {
        return $this->permissions()->where('name', $permission)->exists();
    }
}
