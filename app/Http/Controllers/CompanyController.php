<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
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
    	$company=Company::getAllCompany();
        return view('company.index')->with('company',$company);
    }
    public function create()
    {
        return view('company.create');
    }
    public function store()
    {
    	$validator = validator(request()->all(), [
    		'name' => 'required',
    	]);
    	if($validator->fails()) {
    		return back()->withErrors($validator);
    	}
    	$company = new Company;
    	$company->name = request()->name;
    	$company->email = request()->email;
    	$company->address = request()->address;
        $company->save();
        return redirect()->route('company');


    }
    public function edit($id)
    {
    	$company = Company::findOrFail($id);
        return view('company.edit')->with('company',$company);
    }

    public function update(Request $request, $id)
    {
        $company=Company::findOrFail($id);
        $validator = validator(request()->all(), [
    		'name' => 'required',
    	]);
    	if($validator->fails()) {
    		return back()->withErrors($validator);
    	}
    	$company->name = request()->name;
    	$company->email = request()->email;
    	$company->address = request()->address;
        $company->update();
        return redirect()->route('company');
    }
    public function delete($id)
    {
    	$company = Company::find($id);
    	$company->delete();
    	return redirect()->route('company')->with('info', 'Company deleted');
    }
}
