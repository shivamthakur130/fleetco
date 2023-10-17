<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fleet;
use App\Models\Driver;
use Illuminate\Support\Str;

class FleetController extends Controller
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
        $fleets = Fleet::get();
        return view('admin.master_data.fleet_list',compact('fleets'));
    }

    public function create()
    {   $drivers = Driver::get();
        $fleets = Fleet::get();
        return view('admin.master_data.fleet_create',compact('drivers','fleets'));
    }

    public function store(request $request)
    {
        $validated = $request->validate([
            'internal_id' => 'required',
            'plate_number' => 'required',
            'vin_number' => 'required',
            'vehicle_model' => 'required',
            'assigned_driver' => 'required',
            'kph' => 'required',
            'engine_bore' => 'required',
            'fuel' => 'required'
        ]);

        $fleet = new Fleet;
        $fleet->unique_id = Str::random(40);
        $fleet->internal_id = $request->internal_id;
        $fleet->plate_number = $request->plate_number;
        $fleet->vin_number = $request->vin_number;
        $fleet->vehicle_make = $request->vehicle_make;
        $fleet->vehicle_model = $request->vehicle_model;
        $fleet->year = $request->vehicle_year;
        $fleet->driver_assigned = $request->assigned_driver;
        
        $fleet->kph = $request->kph;
        $fleet->body_type = $request->body_type;
        $fleet->door = $request->doors;
        $fleet->driver_type = $request->driver_type;
        $fleet->length = $request->vehicle_length;

        $fleet->seat = $request->seats;
        $fleet->speed = $request->top_speed;
        $fleet->transmission_type = $request->transmission_type;
        $fleet->engine_bore = $request->engine_bore;
        $fleet->engine_cc = $request->cc;
        $fleet->compression = $request->compression;

        $fleet->cylinder = $request->cylinders;
        $fleet->position = $request->position;
        $fleet->power_ps = $request->power_ps;
        $fleet->power_rpm = $request->power_rpm;
        $fleet->stroke = $request->stroke;
        $fleet->torque_nm = $request->torque_nm;

        $fleet->torque_rpm = $request->torque_rpm;
        $fleet->valve_per_cylinder = $request->valves;
        $fleet->fuel_type = $request->fuel;
        $fleet->fuel_cap = $request->fuel_cap;
        $fleet->liter_per_km_city = $request->liter_per_km_city;
        $fleet->liter_per_km_highway = $request->liter_per_km_highway;
        $fleet->liter_per_km_mixed = $request->liter_per_km_mixed;

        if($files = $request->file('image')) {
            //$image = $request->file('edit_image');
            //$request->image->move(public_path('images'), $imageName);
            $destinationPath = 'public/fleet/'; // upload path
            $image = time() . "." . $files->getClientOriginalExtension();
            $request->image->move(public_path('fleet'), $image);
            $fleet->vehicle_image = $image;
        } 
        $fleet->save();
    
        return redirect()->route('admin.fleet')->with('message', 'Fleet Saved successfully.');
    }

    public function edit($id){
        $fleet = Fleet::where('unique_id',$id)->first();
        $drivers = Driver::get();
        $fleets = Fleet::get();
        return view('admin.master_data.edit',compact('fleet','drivers','fleets'));
    }

    public function destroy($id){
        $fleet = Fleet::where('id', $id)->first();
        $fleet->delete();
        return redirect()->route('admin.fleet')->with('error', 'Fleet Deleted successfully.');

    }
    
    public function update(request $request ){
        $fleet = Fleet::where('id',$request->id)->first();
        
        $fleet->internal_id = $request->internal_id;
        $fleet->plate_number = $request->plate_number;
        $fleet->vin_number = $request->vin_number;
        $fleet->vehicle_make = $request->vehicle_make;
        $fleet->vehicle_model = $request->vehicle_model;
        $fleet->year = $request->vehicle_year;
        $fleet->driver_assigned = $request->assigned_driver;
        
        $fleet->kph = $request->kph;
        $fleet->body_type = $request->body_type;
        $fleet->door = $request->doors;
        $fleet->driver_type = $request->driver_type;
        $fleet->length = $request->vehicle_length;

        $fleet->seat = $request->seats;
        $fleet->speed = $request->top_speed;
        $fleet->transmission_type = $request->transmission_type;
        $fleet->engine_bore = $request->engine_bore;
        $fleet->engine_cc = $request->cc;
        $fleet->compression = $request->compression;

        $fleet->cylinder = $request->cylinders;
        $fleet->position = $request->position;
        $fleet->power_ps = $request->power_ps;
        $fleet->power_rpm = $request->power_rpm;
        $fleet->stroke = $request->stroke;
        $fleet->torque_nm = $request->torque_nm;

        $fleet->torque_rpm = $request->torque_rpm;
        $fleet->valve_per_cylinder = $request->valves;
        $fleet->fuel_type = $request->fuel;
        $fleet->fuel_cap = $request->fuel_cap;
        $fleet->liter_per_km_city = $request->liter_per_km_city;
        $fleet->liter_per_km_highway = $request->liter_per_km_highway;
        $fleet->liter_per_km_mixed = $request->liter_per_km_mixed;

        // if($files = $request->file('image')) {
        //     //$image = $request->file('edit_image');
        //     //$request->image->move(public_path('images'), $imageName);
        //     $destinationPath = 'public/fleet/'; // upload path
        //     $image = time() . "." . $files->getClientOriginalExtension();
        //     $request->image->move(public_path('fleet'), $image);
        //     $fleet->vehicle_image = $image;
        // } 
        if($files = $request->file('image')) {

            if($fleet->vehicle_image){
                unlink(public_path('fleet/'.$fleet->vehicle_image));
            }
            //$image = $request->file('edit_image');
            //$request->image->move(public_path('images'), $imageName);
            $destinationPath = 'public/fleet/'; // upload path
            $image = time() . "." . $files->getClientOriginalExtension();
            $request->image->move(public_path('fleet'), $image);
            $fleet->vehicle_image = $image;
        }  
        $fleet->save();
    
        return redirect()->route('admin.fleet')->with('message', 'Fleet Update successfully.');
    }
}
