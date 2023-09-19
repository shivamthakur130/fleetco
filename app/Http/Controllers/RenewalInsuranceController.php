<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RenewalInsurance;
use App\Models\InsuranceClaim;
use App\Models\FleetType;
use App\Models\VehicleType;
use App\Models\InsuranceCompany;
use Illuminate\Support\Str;
use Auth;


class RenewalInsuranceController extends Controller
{
    public function index()
    {
        $rinsurance = RenewalInsurance::get();
        $fleet = FleetType::get();
        $vehicle = VehicleType::get();
        $insurance = InsuranceCompany::get();
        return view('admin.renewal_insurance.list', compact('rinsurance','fleet', 'vehicle', 'insurance'));
    }

    public function create(request $request){
        $fleet = FleetType::get();
        $vehicle = VehicleType::get();
        $insurance = InsuranceCompany::get();
        return view('admin.renewal_insurance.add',compact('fleet', 'vehicle', 'insurance'));
    }

    public function store(request $request){
        $validated = $request->validate([
           
            'fleet' => 'required',
            'insurer' => 'required',
            'vehicle_type' => 'required',
        ]);
        //dd($request->toARray());   
        $insu = new RenewalInsurance;
        $insu->unique_id = Str::random(40);
        $insu->fleet_type = $request->fleet;
        $insu->vehicle_number = $request->vehicle_number;
        $insu->vehicle_type = $request->vehicle_type;
        $insu->renewal = $request->renewal;
        $insu->premium = $request->premium;
        $insu->insurance = $request->insurer;
        $insu->from = $request->from;
        $insu->to = $request->to;
        $insu->pay_ref = $request->pay_ref;
        $insu->pay_date = $request->pay_date;
        $insu->enterd_by = Auth::user()->name;
        $insu->system_date = date('Y-m-d');
        $insu->save();

        return redirect()->route('admin.renewal.insurance')->with('message', 'Renewal Insurance Saved successfully.');
    }

    public function edit($id){
        $rinsurance = RenewalInsurance::where('unique_id', $id)->first();
        $fleet = FleetType::get();
        $vehicle = VehicleType::get();
        $insurance = InsuranceCompany::get();
        return view('admin.renewal_insurance.edit',compact('fleet', 'vehicle', 'insurance','rinsurance'));
    }

    public function destroy($id){
        $ic = RenewalInsurance::where('id', $id)->first();
        $ic->delete();
        return redirect()->route('admin.renewal.insurance')->with('error', 'Renewal Insurance Deleted successfully.');

    }

    public function update(request $request ){
        $insu = RenewalInsurance::where('id',$request->id)->first();
        
        //$insu->unique_id = Str::random(40);
        $insu->fleet_type = $request->fleet;
        $insu->vehicle_number = $request->vehicle_number;
        $insu->vehicle_type = $request->vehicle_type;
        $insu->renewal = $request->renewal;
        $insu->premium = $request->premium;
        $insu->insurance = $request->insurer;
        $insu->from = $request->from;
        $insu->to = $request->to;
        $insu->pay_ref = $request->pay_ref;
        $insu->pay_date = $request->pay_date;
        $insu->enterd_by = Auth::user()->name;
        $insu->save();
    
        return redirect()->route('admin.renewal.insurance')->with('message', 'Renewal Insurance Update successfully.');
    }
}
