<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('employee', [EmployeeController::class, 'index'])->name('employee');
Route::get('employee_edit/{Employee_Id}', [EmployeeController::class, 'index'])->name('employee.edit');
Route::get('delete/{Employee_Id}', [EmployeeController::class, 'delete'])->name('employee.delete');


Route::post('employee-create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('employee_update/{Employee_Id}/update', [EmployeeController::class, 'create'])->name('employee.update');
