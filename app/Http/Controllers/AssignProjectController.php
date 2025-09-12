<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Http\Request;

class AssignProjectController extends Controller
{
    public function assignProject()
    {
        $employees = Employee::get();
        // $employee->projects; // all projects employee #1 works on

        $projects = Project::get();
        // $project->employees; // all employees in project #2

        return view('project_management.pages.assignProject.assignProject' , compact('employees', 'projects'));
    }
}
