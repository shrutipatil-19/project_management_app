<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'desc',
        'start_date',
        'end_date',
        'timeline',
        'img'
    ];
    // public function employees()
    // {
    //     return $this->belongsToMany(Employee::class, 'employee_project', 'assign_employee', 'assign_project');
    // }
}
