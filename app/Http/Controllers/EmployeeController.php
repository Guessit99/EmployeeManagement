<?php

namespace App\Http\Controllers;

use App\Models\EmployeeManagement;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        // return $request;
        $employee = array();
        if ($request->id != '') {


            $employee = EmployeeManagement::where('id', $request->id)->delete();
        }
        $employee_mangement = EmployeeManagement::get();

        return view('employee', compact('employee_mangement', 'employee'));
    }
    public function create(Request $request)
    {
        // return $request;
        // return $request->Employee_First_Name . ' ' . $request->Employee_Last_Name;
        if ($request->employee_id != '') {

            $employee = EmployeeManagement::where('id', $request->employee_id)->first();
        } else {
            $employee = new EmployeeManagement();
        }
        // $employee->id = $request->Employee_Id;
        $employee->name = $request->Employee_First_Name . ' ' . $request->Employee_Last_Name;
        $employee->department = $request->Department;

        $employee->save();
        return redirect(route('employee'));
    }
    public function edit_employee(Request $request)
    {
        $employee = new EmployeeManagement();
        $employee->id = $request->Employee_Id;
        $employee->name = $request->Employee_First_Name . ' ' . $request->Employee_Last_Name;
        $employee->department = $request->Department;
        return view('employee_update', compact('employee'));
    }



    public function delete($employee)
    {
        return request('id');

        // $employee = EmployeeManagement::where('id', $request->employee_id)->delete();

        // return redirect()->route('employee');
    }
}
