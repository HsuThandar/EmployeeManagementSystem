<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class EmployeeController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employee=Employee::getAllEmployee();
        return view('employee.index')->with('employee',$employee);
    }
    public function create()
    {
        $company=Company::get();
        return view('employee.create')->with('company',$company);
    }
    public function store()
    {
        $validator = validator(request()->all(), [
            'fname' => 'required',
            'lname' => 'required',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
        $employee = new Employee;
        $employee->staffid = request()->staffid;
        $employee->fname = request()->fname;
        $employee->lname = request()->lname;
        $employee->companyid = request()->companyid;
        $employee->department = request()->department;
        $employee->email = request()->email;
        $employee->phone = request()->phone;
        $employee->address = request()->address;
        $employee->save();
        return redirect()->route('employee');


    }
    public function edit($id)
    {
        $companyname=Company::get();
        $employee = Employee::findOrFail($id);
        return view('employee.edit')->with('employee',$employee)->with('companyname',$companyname);
    }

    public function update(Request $request, $id)
    {
        $employee=Employee::findOrFail($id);
        $validator = validator(request()->all(), [
            'fname' => 'required',
            'lname' => 'required',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
        $employee->staffid = request()->staffid;
        $employee->fname = request()->fname;
        $employee->lname = request()->lname;
        $employee->companyid = request()->companyid;
        $employee->department = request()->department;
        $employee->email = request()->email;
        $employee->phone = request()->phone;
        $employee->address = request()->address;
        $employee->update();
        return redirect()->route('employee');
    }
    public function delete($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employee')->with('info', 'Employee deleted');
    }
}
