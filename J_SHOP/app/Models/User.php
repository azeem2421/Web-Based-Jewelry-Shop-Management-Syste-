<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Order;
use App\Models\Address;
use App\Models\Module;
use App\Models\Role;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function latestAddress()
    {
        return $this->hasOneThrough(
            Address::class,
            Order::class,
            'user_id',     // Foreign key on orders table
            'order_id',    // Foreign key on addresses table
            'id',          // Local key on users table
            'id'           // Local key on orders table
        )->latest('addresses.created_at');
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'module_user');
    }

    public function hasModuleAccess(string $moduleName): bool
    {
        return $this->modules()->where('name', $moduleName)->exists();
    }


    public function role()
{
    return $this->belongsTo(Role::class);
}

}
