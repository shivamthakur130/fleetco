<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fuel;
use App\Models\Country;
use Illuminate\Support\Str;

class FuelController extends Controller
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
        $fuels = Fuel::get();
        return view('admin.fuels.list', compact('fuels'));
    }
    public function create(){
        $countries = Country::get();
        return view('admin.fuels.add', compact('countries'));
    }
    public function store(request $request){
        $validated = $request->validate([
            'fuel_station' => 'required',
        ]);
           
        $fuel = new Fuel;
        $fuel->unique_id = Str::random(40);
        $fuel->fuel_station = $request->fuel_station;
        $fuel->fuel_price = $request->fuel_price;
        $fuel->fuel_type = $request->fuel_type;
        $fuel->address = $request->address;
        $fuel->deposit_kept = $request->deposit;
        $fuel->contact_number = $request->cnumber;
        $fuel->city = $request->city;
        $fuel->country = $request->country;
        $fuel->state = $request->state;
        $fuel->address = $request->address;
        $fuel->address_2 = $request->address_2;
        $fuel->zip = $request->zip;
        $fuel->save();
    
        return redirect()->route('admin.fuel')->with('message', 'Fuel Station Saved successfully.');
    }
    public function edit($id){    
        $countries = Country::get();
        $fuel = Fuel::where('unique_id',$id)->first();
        return view('admin.fuels.edit', compact('fuel','countries'));
    }

    public function update(request $request){
           
        $fuel = Fuel::where('id',$request->id)->first();
        $fuel->fuel_station = $request->fuel_station;
        $fuel->fuel_price = $request->fuel_price;
        $fuel->fuel_type = $request->fuel_type;
        $fuel->address = $request->address;
        $fuel->deposit_kept = $request->deposit;
        $fuel->contact_number = $request->cnumber;
        $fuel->city = $request->city;
        $fuel->country = $request->country;
        $fuel->state = $request->state;
        $fuel->address = $request->address;
        $fuel->address_2 = $request->address_2;
        $fuel->zip = $request->zip;
        $fuel->save();
        return redirect()->route('admin.fuel')->with('message', 'Fuel Station Update successfully.');
    }
    public function destroy($id){
        $fuel = Fuel::where('id', $id)->first();
        $fuel->delete();
        return redirect()->route('admin.fuel')->with('error', 'Fuel Station Deleted successfully.');

    }
}
