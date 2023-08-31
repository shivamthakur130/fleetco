<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FleetType;
use Illuminate\Support\Str;

class FleetTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fleetTypes = FleetType::get();
        return view('admin.fleet_types.list', compact('fleetTypes'));
    }

    public function create()
    {
        return view('admin.fleet_types.add');
    }
    public function store(request $request){
        $validated = $request->validate([
            'fleet_type' => 'required',
            
        ]);
           
        $fleet_type = new FleetType;
        $fleet_type->unique_id = Str::random(40);
        $fleet_type->fleet_type = $request->fleet_type;
        $fleet_type->in_charge = $request->in_charge;

        $fleet_type->save();
    
        return redirect()->route('admin.fleet-type')->with('message', 'Fleet Type Saved successfully.');
    }

    public function destroy($id){
        $fleet_type = FleetType::where('id', $id)->first();
        $fleet_type->delete();
        return redirect()->route('admin.fleet-type')->with('error', 'Fleet Type Deleted successfully.');

    }

    public function edit($id){
        
        $fleet_type = FleetType::where('unique_id',$id)->first();
        return view('admin.fleet_types.edit', compact('fleet_type'));
    }
    public function update(request $request){
           
        $fleet_type = FleetType::where('id',$request->id)->first();
        $fleet_type->fleet_type = $request->fleet_type;
        $fleet_type->in_charge = $request->in_charge;
        $fleet_type->save();
    
        return redirect()->route('admin.fleet-type')->with('message', 'Fleet Type Update successfully.');
    }
}
