<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password'
    ];
    // Mutator
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    // public function projects()
    // {
    //     return $this->belongsToMany(Project::class, 'assign_projects', 'assign_project', 'assign_employee');
    // }
}
