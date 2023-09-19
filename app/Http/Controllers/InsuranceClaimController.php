<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InsuranceClaim;
use App\Models\FleetType;
use App\Models\VehicleType;
use App\Models\InsuranceCompany;
use Illuminate\Support\Str;
use Auth;

class InsuranceClaimController extends Controller
{
    public function index()
    {
        $IClaims = InsuranceClaim::get();
        $fleet = FleetType::get();
        $vehicle = VehicleType::get();
        $insurance = InsuranceCompany::get();
        return view('admin.insurance_claims.list', compact('IClaims','fleet', 'vehicle', 'insurance'));
    }

    public function create(request $request){
        $fleet = FleetType::get();
        $vehicle = VehicleType::get();
        $insurance = InsuranceCompany::get();
        return view('admin.insurance_claims.add',compact('fleet', 'vehicle', 'insurance'));
    }

    public function store(request $request){
        $validated = $request->validate([
            'claim' => 'required',
            'recp_ref' =>  'required',
            'fleet' => 'required',
            'insurer' => 'required',
            'acc_ref' => 'required',
            'vehicle_type' => 'required',
        ]);
        //dd($request->toARray());   
        $insu = new InsuranceClaim;
        $insu->unique_id = Str::random(40);
        $insu->fleet_type = $request->fleet;
        $insu->vehicle_number = $request->vehicle_number;
        $insu->vehicle_type = $request->vehicle_type;
        $insu->date = $request->date;
        $insu->accident_ref = $request->acc_ref;
        $insu->insurance = $request->insurer;
        $insu->claim = $request->claim;
        $insu->recepient_ref = $request->recp_ref;
        $insu->remarks = $request->remark;
        $insu->enterd_by = Auth::user()->name;
        $insu->system_date = date('Y-m-d');
        $insu->save();

        return redirect()->route('admin.insurance.claim')->with('message', 'Insurance Claim Saved successfully.');
    }

    public function destroy($id){
        $ic = InsuranceClaim::where('id', $id)->first();
        $ic->delete();
        return redirect()->route('admin.insurance.claim')->with('error', 'Insurance Claim Deleted successfully.');

    }
    public function edit($id){
        $insuranceClaim = InsuranceClaim::where('unique_id', $id)->first();
        $fleet = FleetType::get();
        $vehicle = VehicleType::get();
        $insurance = InsuranceCompany::get();
        return view('admin.insurance_claims.edit',compact('fleet', 'vehicle', 'insurance','insuranceClaim'));
    }

    public function update(request $request ){
        $insu = InsuranceClaim::where('id',$request->id)->first();
        
        $insu->fleet_type = $request->fleet;
        $insu->vehicle_number = $request->vehicle_number;
        $insu->vehicle_type = $request->vehicle_type;
        $insu->date = $request->date;
        $insu->accident_ref = $request->acc_ref;
        $insu->insurance = $request->insurer;
        $insu->claim = $request->claim;
        $insu->recepient_ref = $request->recp_ref;
        $insu->remarks = $request->remark;
        $insu->enterd_by = Auth::user()->name;
        // $insu->system_date = date('Y-m-d');
        $insu->save();
    
        return redirect()->route('admin.insurance.claim')->with('message', 'Insurance Claim Update successfully.');
    }
}
