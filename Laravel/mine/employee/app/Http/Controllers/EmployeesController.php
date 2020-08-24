<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        return response()->json($employee, 200);
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $create = Employee::create($request->all());
       return response()->json($create,201);
    }


       /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return response()->json($employee, 200);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $object = $employee->update($request->all());
        // $object = Employee::find($employee);

        // $object->fname = $request->fname;
        // $object->lname = $request->lname;
        // $object->email = $request->email;
        // $object->status = $request->status;
        // $object->save();
        return response()->json($object, 201);
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(null, 204);

    }





    public function paid()
    {
        $employee = Employee::where("status", 1)->get();
        return response()->json($employee, 200);
    }





    public function unpaid()
    {
        $employee = Employee::where("status", 0)->get();
        return response()->json($employee, 200);
    }




    public function checkToggle($id, $value)
    {
        $employee = Employee::find($id);
        if ($value == 0){
            $employee->status = 1;
        } else {
            $employee->status = 0;

        }
        $employee->save();
        return response()->json($employee, 200);
    }
}

