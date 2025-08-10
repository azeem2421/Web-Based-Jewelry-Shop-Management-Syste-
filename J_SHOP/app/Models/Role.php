<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
use App\Models\User;

class Role extends Model
{
    protected $fillable = ['name', 'description'];

    // Many-to-Many: Roles <-> Permissions
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }

    // One-to-Many: Role -> Users
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
