<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Company;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('company')->paginate(5);
        
        return view('employee.index' , ['employees'=>$employees]);

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $companies = Company::all();
        return view('employee.add_employee' , ['companies'=>$companies]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required',
            'phone_number' => 'required',
            'company_id' => 'required',
        ],
        [
            'first_name.required'=>'Please Enter Name',
            'last_name.required'=>'Please Enter Name',
            'email'=>'Please Enter valid Email',
            'phone_number'=>'Please Enter valid Phone Number',
            'company_id'=>'Please Enter valid Email' 
        ]);
        
        $company = employee::create($validatedData);

         return redirect()->route('home')->with('success', 'employee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee)
    {     
        return view('employee.edit' , [
            'employee'  =>  $employee,
            'companies' =>  Company::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required',
            'company_id' => 'required',
        ], [
            'first_name.required' => 'Please enter a first name.',
            'last_name.required' => 'Please enter a last name.',
            'email.required' => 'Please enter a valid email address.',
            'phone_number.required' => 'Please enter a phone number.',
            'company_id.required' => 'Please select a company.',
        ]);

        $employee->update($validatedData);

        return redirect()->route('home')->with('success', 'Employee updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully.');
    }
}
