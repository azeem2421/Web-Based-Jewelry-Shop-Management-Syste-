<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerApplication extends Model
{
 protected $fillable = ['name', 'email', 'role', 'cv_path', 'checked'];
}
