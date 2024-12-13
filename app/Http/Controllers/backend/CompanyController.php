<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::orderBy('company_name')->get();
        return view('backend.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'owner' => 'required',
            'number' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required'

            

        ]);


        if ($image = $request->file('photo')) {
            $destinationPath = 'images/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath.$postImage;
        }
        
        else{
        $photo = 'images/nophoto.jpg';
        }

        $company = new Company;

        $company->company_name = $request->name;
        $company->owner_name = $request->owner;
        $company->phone = $request->number;
        $company->photo =$photo ;
        $company->status = $request->status;

        $company->save();
        return redirect()->route('company.index')->with('msg','Inserted Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('backend.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([

            'name' => 'required',
            'owner' => 'required',
            'number' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required'

            

        ]);

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $photo = $destinationPath.$postImage;
        }
        
        else{
        $photo = $company->company_name;
        }

        $company->company_name = $request->name;
        $company->owner_name = $request->owner;
        $company->phone = $request->number;
        $company->photo =$photo ;
        $company->status = $request->status;

        $company->update();
        return redirect()->route('company.index')->with('msg','Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('company.index')->with('msg','Deleted Successfully');

    }
}
