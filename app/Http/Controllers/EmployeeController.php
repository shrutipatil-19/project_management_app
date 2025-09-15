<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function loginEmp()
    {
        return view('project_management.pages.employee.login');
    }
    public function loginUserEmp(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::guard('employee')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]))

            $request->session()->regenerate();
        return redirect()->route('addProject')->with('success', 'Login successful');
    }
    public function logoutUserEmp(Request $request)
    {

        Auth::guard('employee')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Employee Edited successfully');
    }
}
