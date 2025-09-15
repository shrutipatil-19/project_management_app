<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssignProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/admin/register', [AdminController::class, 'index'])->name('register');
Route::post('/admin/register', [AdminController::class, 'create'])->name('addAdmin');
Route::get('/admin/login', [AdminController::class, 'login'])->name('login');
Route::post('/admin/login', [AdminController::class, 'loginUser'])->name('loginUser');
Route::post('/admin/login', [AdminController::class, 'logoutUser'])->name('logoutUser');


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin/add-project', [ProjectController::class, 'index'])->name('addProject');
Route::post('/admin/add-project', [ProjectController::class, 'create'])->name('createProject');
Route::get('/admin/list-project', [ProjectController::class, 'list'])->name('listProject');
Route::get('/admin/edit-project/{id}', [ProjectController::class, 'edit'])->name('editProject');
Route::put('/admin/edit-project/{id}', [ProjectController::class, 'update'])->name('updateProject');
Route::delete('/admin/delete-project/{project}', [ProjectController::class, 'delete'])->name('deleteProject');

Route::get('/admin/add-employee', [EmployeeController::class, 'index'])->name('addEmployee');
Route::post('/admin/add-employee', [EmployeeController::class, 'create'])->name('createEmployee');
Route::get('/admin/list-employee', [EmployeeController::class, 'list'])->name('listEmployee');
Route::get('/admin/edit-employee/{id}', [EmployeeController::class, 'edit'])->name('editEmployee');
Route::put('/admin/edit-employee/{id}', [EmployeeController::class, 'update'])->name('updateEmployee');
Route::delete('/admin/delete-employee/{id}', [EmployeeController::class, 'delete'])->name('deleteEmployee');

Route::get('/admin/assign-project/', [AssignProjectController::class, 'assignProject'])->name('assignProject');
