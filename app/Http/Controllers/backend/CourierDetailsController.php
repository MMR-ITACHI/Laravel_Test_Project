<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Cost;
use App\Models\Courierdetail;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourierDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $employeeId = Auth::id(); 
        $couriers = Courierdetail::OrderBy('id','desc')->where('sender_agent_id', $employeeId)->get();
        

        
        return view('backend.courierdetails.courier_list_index',compact('couriers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::all();
        $branches = Branch::where('status', 'active')->get();
        return view('backend.courierdetails.create',compact('units','branches'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sender_agent_id = Auth::user()->id;
        $sender_branch_id = Auth::user()->branch_id;
        $manager_id = Auth::user()->manager_id;
        $tracking = time().'A';


        $cdetails =   new Courierdetail;

        $cdetails->sender_type = $request->sender_type;
        $cdetails->company_name = $request->company_name;
        $cdetails->sender_name = $request->sender_name;
        $cdetails->sender_email = $request->sender_email;
        $cdetails->sender_phone = $request->sender_phone_number;
        $cdetails->sender_address = $request->sender_address;
        $cdetails->receiver_name = $request->receiver_name;
        $cdetails->receiver_email = $request->receiver_email;
        $cdetails->receiver_phone = $request->receiver_phone_number;
        $cdetails->receiver_address = $request->receiver_address;

        $cdetails->sender_branch_id = $sender_branch_id;
        $cdetails->receiver_branch_id = $request->receiver_branch_id;
        $cdetails->sender_agent_id = $sender_agent_id;
        $cdetails->manager_id = $manager_id;


        $cdetails->status = $request->status;
        $cdetails->tracking_id = $tracking;
        $cdetails->item_description = $request->item_description;
        $cdetails->unit_name = $request->unit_name;
        $cdetails->cost = $request->unit_price;
        $cdetails->quantity = $request->quantity;
        $cdetails->total_cost = $request->total;
        $cdetails->comment = $request->special_comment;
        $cdetails->grand_total = $request->subtotal;
        $cdetails->payment_type = $request->payment_type;
        $cdetails->payment_status = $request->payment_status;
        $cdetails->payment_amount = $request->amt;

        $cdetails->save();

        return redirect()->route('courierdetails.create')->with('msg','Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Courierdetail $courierdetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Courierdetail $courierdetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Courierdetail $courierdetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Courierdetail $courierdetail)
    {
        //
    }

    public function Invoice($id)
    {
        $records =Courierdetail::find($id);
        return view('backend.courierdetails.invoice',compact('records'));
    }


    //  public function updatepaymentstatus(Request $request)
    //  {
    //     $senderPayment = $request->input('sender_payment');
    //      $paymentStatus = $request->input('payment_status');
    //       // Update the payment status in your relevant table
    //      DB::table('courierdetails')
    //       ->where('payment_type', $senderPayment)
    //        ->insert(['payment_status' => $paymentStatus]);
    //         return response()->json(['success' => true]);

    // return response()->json(['success' => true]);
    //  }

    public function getCost($unit_id) {
         $cost = Cost::where('unit_id', $unit_id)->get();
//dd($cost);
        foreach($cost as $cos){
            $val = $cos->cost;
        }
          if ($val) { return response()->json(['cost' => $val]); 
                     } 
                   return response()->json(['cost' => null]); 
                }





                public function CompanyForm()
    {
        // You can also pass any additional data to the view if needed
        return response()->json(['html' => view('backend.courierdetails.company_name')->render()]);
        //return view('backend.courierdetails.company_name');
    }
    
}
