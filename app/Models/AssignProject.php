<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignProject extends Model
{
    protected $fillable = [
        'assign_project',
        'assign_employee'
    ];
}
