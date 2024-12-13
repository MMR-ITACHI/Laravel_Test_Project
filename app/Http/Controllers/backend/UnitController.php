<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::orderBy('name')->get();
        return view('backend.unit.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
         'name'=>'required',
         'status'=>'required',
        ]);

        $unit= new Unit;

        $unit->name = $request->name;
        $unit->status = $request->status;

        $unit->save();

        return redirect()->route('unit.index')->with('msg', 'Inserted Successfully');


      
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
     return view('backend.unit.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'name'=>'required',
            'status'=>'required',
           ]);


           $unit->name = $request->name;
        $unit->status = $request->status;

        $unit->update();
        return redirect()->route('unit.index')->with('msg', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect()->route('unit.index')->with('msg','Deleted Successfully');
    }
}
