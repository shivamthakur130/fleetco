<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleType;
use Illuminate\Support\Str;

class VehicleTypeController extends Controller
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
        $vt = VehicleType::get();
        return view('admin.vehicle_type.list', compact('vt'));
    }

    public function create(){
        return view('admin.vehicle_type.add');
    }

    public function store(request $request){
        $validated = $request->validate([
            'vehicle_type' => 'required',

        ]);
           
        $sc = new VehicleType;
        $sc->unique_id = Str::random(40);
        $sc->vehicle_type = $request->vehicle_type;
        $sc->save();
    
        return redirect()->route('admin.vehicle_type')->with('message', 'Vehicle Type Saved successfully.');
    }

    public function destroy($id){
        $vt = VehicleType::where('id', $id)->first();
        $vt->delete();
        return redirect()->route('admin.vehicle_type')->with('error', 'Vehicle Type Deleted successfully.');

    }

    public function edit($id){
        
        $vt = VehicleType::where('unique_id',$id)->first();
        return view('admin.vehicle_type.edit', compact('vt'));
    }

    public function update(request $request){
           
        $vt = VehicleType::where('id',$request->id)->first();
        $vt->vehicle_type = $request->vehicle_type;
        $vt->save();
    
        return redirect()->route('admin.vehicle_type')->with('message', 'Vehicle Type Update successfully.');
    }
}
