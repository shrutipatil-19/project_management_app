<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('project_management.pages.employee.createEmployee');
    }
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'required',
            'password' => 'required|string',
        ]);

        $employee = Employee::create($validated);
        return redirect()->route('listEmployee')->with('success', 'Employee add successfully');
    }
    public function list()
    {
        $employees = Employee::get();
        return view('project_management.pages.employee.listEmployee', compact('employees'));
    }
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('project_management.pages.employee.editEmployee', compact('employee'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required'
        ]);

        $employee = Employee::findOrFail($id);

        $employee->update($validated);
        return redirect()->route('listEmployee')->with('success', 'Employee Edited successfully');
    }
    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('listEmployee')->with('success', 'Employee Edited successfully');
    }
}
