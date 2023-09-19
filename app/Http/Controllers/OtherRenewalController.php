<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OtherRenewal;
use App\Models\InsuranceClaim;
use App\Models\FleetType;
use App\Models\VehicleType;
use App\Models\Renewal;
use Illuminate\Support\Str;
use Auth;


class OtherRenewalController extends Controller
{
    public function index()
    {
        $otherRenewal = OtherRenewal::get();
        $fleet = FleetType::get();
        $vehicle = VehicleType::get();
        $renewals = Renewal::get();
        return view('admin.other_renewal.list', compact('otherRenewal','fleet', 'vehicle','renewals'));
    }

    public function create(request $request){
        $fleet = FleetType::get();
        $vehicle = VehicleType::get();
        $renewals = Renewal::get();
        return view('admin.other_renewal.add',compact('fleet', 'vehicle','renewals'));
    }

    public function destroy($id){
        $ic = OtherRenewal::where('id', $id)->first();
        $ic->delete();
        return redirect()->route('admin.other.renewal')->with('error', 'Other Renewal Deleted successfully.');

    }

    public function edit($id){
        $otherRenewal = OtherRenewal::where('unique_id', $id)->first();
        $fleet = FleetType::get();
        $vehicle = VehicleType::get();
        $renewals = Renewal::get();
        return view('admin.other_renewal.edit',compact('fleet', 'vehicle', 'renewals','otherRenewal'));
    }

    public function update(request $request ){
        //dd($request->toArray());
        $insu = OtherRenewal::where('id',$request->id)->first();
    
        $insu->fleet_type = $request->fleet;
        $insu->vehicle_number = $request->vehicle_number;
        $insu->vehicle_type = $request->vehicle_type;
        $insu->renewal_type = $request->renewal;
        $insu->cost = $request->cost;
        $insu->from = $request->from;
        $insu->to = $request->to;
        $insu->pay_ref = $request->pay_ref;
        $insu->pay_date = $request->pay_date;
        $insu->enterd_by = Auth::user()->name;
        $insu->save();
    
        return redirect()->route('admin.other.renewal')->with('message', 'Other Renewal Update successfully.');
    }

    public function store(request $request){
        $validated = $request->validate([
           
            'fleet' => 'required',
            'vehicle_type' => 'required',
        ]);
        //dd($request->toARray());   
        $insu = new OtherRenewal;
        $insu->unique_id = Str::random(40);
        $insu->fleet_type = $request->fleet;
        $insu->vehicle_number = $request->vehicle_number;
        $insu->vehicle_type = $request->vehicle_type;
        $insu->renewal_type = $request->renewal;
        $insu->cost = $request->cost;
        $insu->from = $request->from;
        $insu->to = $request->to;
        $insu->pay_ref = $request->pay_ref;
        $insu->pay_date = $request->pay_date;
        $insu->enterd_by = Auth::user()->name;
        $insu->system_date = date('Y-m-d');
        $insu->save();

        return redirect()->route('admin.other.renewal')->with('message', 'Other Renewal Saved successfully.');
    }
}
