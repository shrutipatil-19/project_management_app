<?php

namespace App\Http\Controllers;

use App\Models\AssignProject;
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
    public function assignProjectCreate(Request $request){
         $validated = $request->validate([
            'assign_project' => 'required',
            'assign_employee' => 'required'
         ]);
         
         $assign_project = AssignProject::create($validated);

         return redirect()->route('listProject')->with('success', 'Assign project Successfully');
    }

    public function listAssignProject(){
        $assign_projects = AssignProject::get();
        return view('project_management.pages.assignProject.listAssignProject' , compact( 'assign_projects'));
    }
}
