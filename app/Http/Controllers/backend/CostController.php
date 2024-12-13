<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Cost;
use App\Models\Unit;
use Illuminate\Http\Request;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $costs = Cost::all();
        return view('backend.cost.index', compact('costs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::all();
        return view('backend.cost.create',compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'unit_name' =>'required',
            'cost' =>'required',
            'status' =>'required'


        ]);

        $cost = new Cost;

        $cost->unit_id = $request->unit_name;
        $cost->cost = $request->cost;
        $cost->status = $request->status;


        $cost->save();
        return redirect()->route('cost.index')->with('msg','Inserted Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cost $cost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cost $cost)
    {
        $units = Unit::all();
        return view('backend.cost.edit',compact('cost','units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cost $cost)
    {
        $request->validate([
            'unit_name' =>'required',
            'cost' =>'required',
            'status' =>'required'


        ]);

        

        $cost->unit_id = $request->unit_name;
        $cost->cost = $request->cost;
        $cost->status = $request->status;


        $cost->update();
        return redirect()->route('cost.index')->with('msg','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cost $cost)
    {
        $cost->delete();
        return redirect()->route('cost.index')->with('msg','Deleted Successfully');
    }
}
