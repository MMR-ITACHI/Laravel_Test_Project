<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Branch;
use App\Models\Manager;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::OrderBy('id','desc')->get();

        return view('backend.branch.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admins = Admin::all();
        return view('backend.branch.create', compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate(
            [
            'name'=>'required | max:100 | min:5',
            'email'=>'required | email | max:50',
            'admin_name' => 'required',
            'number'=>'required | min:11',
            'address'=>'required',
            'val_skill'=>'required',
            'photo'=>' image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
            
            
            );
            
            if ($image = $request->file('photo')) {
                $destinationPath = 'images/';
                $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $postImage);
                $photo = $destinationPath.$postImage;
            }
            
            else{
            $photo = 'images/nophoto.jpg';
            }
                    
                


        $branch = new Branch;

        $branch->branch_name =$request->name;
        $branch->branch_email =$request->email;
        $branch->admin_id =$request->admin_name;
        $branch->number =$request->number;
        $branch->address =$request->address;
        $branch->status =$request->val_skill;
        $branch->photo =$photo;
        

       $branch->save();
       return redirect()->route('branch.index')->with('msg','Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        return view('backend.branch.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        


        $request->validate(
            [
            'name'=>'required | max:100 | min:5',
            'email'=>'required | email | max:50',
            'number'=>'required | min:11',
            'address'=>'required',
            'val_skill'=>'required',
            'photo'=>' image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
            
            
            );
            
            if ($image = $request->file('photo')) {
                $destinationPath = 'images/';
                $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $postImage);
                $photo = $destinationPath.$postImage;
            }
            
            else{
                $photo =$branch->name;
            }
                    
                


       

        $branch->branch_name =$request->name;
        $branch->branch_email =$request->email;
        $branch->number =$request->number;
        $branch->address =$request->address;
        $branch->status =$request->val_skill;
        $branch->photo =$photo;
        

        $branch->update();
        return redirect()->route('branch.index')->with('msg','Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branch.index')->with('msg','Successfully Deleted');
    }
}
