<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
            $managerId = Auth::id(); 
         $staffs = Employee::where('manager_id', $managerId)->get();
        

        
        
         return view('backend.staffs.index',compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
         $branches = Branch::all();
         $managers = Manager::all();
         return view('backend.staffs.create',compact('branches','managers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
'name'=>'required',
'email'=>'required',
'number'=>'required',
'password'=>'required | min:8 | confirmed',
'branch_name'=>'required',
'manager_name'=>'required',
'status'=>'required',
        ]);

    $employee = new Employee;

    $employee->name = $request->name;
    $employee->email = $request->email;
    $employee->password =bcrypt($request->password);
    $employee->phone = $request->number;
    $employee->branch_id = $request->branch_name;
    $employee->manager_id = $request->manager_name;
    $employee->status = $request->status;

    $employee->save();

    return redirect()->route('staff.index')->with('msg','Inserted Successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $staff)
    {
        $branches = Branch::all();
        return view('backend.staffs.edit',compact('staff','branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Employee $staff )
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'number'=>'required',
            'branch_name'=>'required',
            'status'=>'required',
                    ]);
            
               
            
                $staff->name = $request->name;
                $staff->email = $request->email;
                $staff->phone = $request->number;
                $staff->branch_id = $request->branch_name;
                $staff->status = $request->status;
            
                $staff->update();
            
                return redirect()->route('staff.index')->with('msg','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $staff)
    {
        $staff->delete();
        return redirect()->route('staff.index')->with('msg','Deleted Successfully');

    }
}
