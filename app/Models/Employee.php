<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class Employee extends Model
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
