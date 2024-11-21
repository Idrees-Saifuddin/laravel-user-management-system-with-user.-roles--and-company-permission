<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    public function hasPermissionTo($permission, ?string $guardName = null): bool
    {
        return $this->permissions()->where('name', $permission)->exists();
    }
}

