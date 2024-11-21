<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyPermission extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'permission_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
