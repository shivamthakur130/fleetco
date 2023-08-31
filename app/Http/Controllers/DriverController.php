<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Supplier;
use App\Models\VehicleType;
use Illuminate\Support\Str;

class DriverController extends Controller
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
        $drivers = Driver::get();
        return view('admin.drivers.list', compact('drivers'));
    }

    public function create(request $request){
        $suppliers = Supplier::get();
        $vehicle_type = VehicleType::get();
        return view('admin.drivers.add', compact('suppliers','vehicle_type'));
    }

    public function store(request $request){
        $validated = $request->validate([
            'driver_name' => 'required',
            'email' => 'required',
            'image' => 'max:2048',
        ]);
        //dd($request->toARray());   
        $driver = new Driver;
        $driver->unique_id = Str::random(40);
        $driver->name = $request->driver_name;
        $driver->internal_id = $request->internal_id;
        $driver->driver_license = $request->driver_license;
        $driver->phone = $request->phone_number;
        $driver->email = $request->email;
        $driver->vendor = $request->supplier;
        $driver->vehicle_type = $request->vehicle;
        $driver->city = $request->city;
        $driver->country = $request->country;

        
    
        
        if($files = $request->file('image')) {
            //$image = $request->file('edit_image');
            //$request->image->move(public_path('images'), $imageName);
            $destinationPath = 'public/drivers/'; // upload path
            $image = time() . "." . $files->getClientOriginalExtension();
            $request->image->move(public_path('drivers'), $image);
            $driver->image = $image;
        } 
        $driver->save();
        return redirect()->route('admin.driver')->with('message', 'Driver Saved successfully.');
    }

    public function destroy($id){
        $driver = Driver::where('id', $id)->first();
        $driver->delete();
        return redirect()->route('admin.driver')->with('error', 'Driver Deleted successfully.');

    }
    public function edit($id){
        
        $driver = Driver::where('unique_id',$id)->first();
        $suppliers = Supplier::get();
        $vehicle_type = VehicleType::get();
        return view('admin.drivers.edit', compact('suppliers','driver','vehicle_type'));
    }

    public function update(request $request ){
        $driver = Driver::where('id',$request->id)->first();
        
        $driver->name = $request->driver_name;
        $driver->internal_id = $request->internal_id;
        $driver->driver_license = $request->driver_license;
        $driver->phone = $request->phone_number;
        $driver->email = $request->email;
        $driver->vendor = $request->supplier;
        $driver->vehicle_type = $request->vehicle;
        $driver->city = $request->city;
        $driver->country = $request->country;

        if($files = $request->file('image')) {

            if($driver->image){
                unlink(public_path('drivers/'.$driver->image));
            }
            //$image = $request->file('edit_image');
            //$request->image->move(public_path('images'), $imageName);
            $destinationPath = 'public/drivers/'; // upload path
            $image = time() . "." . $files->getClientOriginalExtension();
            $request->image->move(public_path('drivers'), $image);
            $driver->image = $image;
        }  
        $driver->save();
    
        return redirect()->route('admin.driver')->with('message', 'Driver Update successfully.');
    }
}
