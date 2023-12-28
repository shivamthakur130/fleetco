<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\FleetType;
use App\Models\VehicleType;
use App\Models\ServiceType;
use App\Models\Supplier;
use App\Models\StockCode;
use App\Models\RegularMaintenance;
use Auth;

class RegularMaintenanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $fleetTypes = FleetType::get();
        $services  = ServiceType::get();
        $vehicleTypes = VehicleType::get();
        $regulars = RegularMaintenance::get();
        $suppliers = Supplier::get();
        return view('admin.regular_maintenance.list', compact('fleetTypes','regulars','vehicleTypes','services','suppliers'));
    }

    public function create(request $request){
        $fleetTypes = FleetType::get();
        $vehicleTypes = VehicleType::get();
        $services  = ServiceType::get();
        $suppliers = Supplier::get();
        return view('admin.regular_maintenance.add',compact('fleetTypes', 'vehicleTypes','suppliers','services'));
    }

    public function store(request $request){
        $validated = $request->validate([
            'fleet' => 'required',
            'vehicle' => 'required',
            'type' => 'required',

        ]);  
        $st = new RegularMaintenance;
        $st->unique_id = Str::random(40);
        $st->type = $request->type;
        $st->date = $request->date;
        $st->fleet = $request->fleet;
        $st->vehicle = $request->vehicle;
        $st->maintenance_type = $request->maint_type;
        $st->meter = $request->meter;
        $st->remarks = $request->remark;
        $st->po_number = $request->po;
        $st->cost = $request->cost;
        $st->pay_ref = $request->pay_ref;
        $st->supplier = $request->supplier;
        $st->enterd_by = Auth::user()->name;
        $st->system_date = date('Y-m-d');
        $st->save();

        return redirect()->route('admin.regular.maintenance')->with('message', 'Saved successfully.');
    }
    public function destroy($id){
        $sp = RegularMaintenance::where('id', $id)->first();
        $sp->delete();
        return redirect()->route('admin.regular.maintenance')->with('error', 'Deleted successfully.');

    }

    public function edit($id){
        $regular = RegularMaintenance::where('unique_id',$id)->first();
        $fleetTypes = FleetType::get();
        $vehicleTypes = VehicleType::get();
        $services  = ServiceType::get();
        $suppliers = Supplier::get();
        return view('admin.regular_maintenance.edit', compact('regular','fleetTypes','vehicleTypes','services','suppliers'));
    }

    public function update(request $request){
        $st = RegularMaintenance::where('id', $request->id)->first();
        $st->type = $request->type;
        $st->date = $request->date;
        $st->fleet = $request->fleet;
        $st->vehicle = $request->vehicle;
        $st->maintenance_type = $request->maint_type;
        $st->meter = $request->meter;
        $st->remarks = $request->remark;
        $st->po_number = $request->po;
        $st->cost = $request->cost;
        $st->pay_ref = $request->pay_ref;
        $st->supplier = $request->supplier;
        $st->enterd_by = Auth::user()->name;
        $st->system_date = date('Y-m-d');
        $st->save();
        return redirect()->route('admin.regular.maintenance')->with('message', 'Update successfully.');
    }
}
