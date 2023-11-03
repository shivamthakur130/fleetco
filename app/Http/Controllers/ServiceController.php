<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Str;
use Auth;

class ServiceController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $services = Service::get();
        return view('admin.services.list', compact('services'));
    }
    public function create(request $request){

        return view('admin.services.add');
    }

    public function store(request $request){
        $validated = $request->validate([
            'service_name' => 'required',
            'base_fee' => 'required',
            'service_order_type' => 'required',
        ]);

        $st = new Service;
        $st->unique_id = Str::random(40);
        $st->service_name = $request->service_name;
        $st->service_order_type = $request->service_order_type;
        $st->base_fee = $request->base_fee;
        $st->rate_calculation_method = $request->rate_calculation_method;
        $st->duration_terms = $request->duration_terms;
        $st->cash_on_delivery = $request->cod;
        $st->peak_hours = $request->peak_hours;
        $st->restrict_service_area = $request->service_area;

        $st->save();

        return redirect()->route('admin.service.rate')->with('message', 'Saved successfully.');
    }

    public function destroy($id){
        $re = Service::where('id', $id)->first();
        $re->delete();
        return redirect()->route('admin.service.rate')->with('error', 'Deleted successfully.');

    }

    public function edit($id){
        
        $service = Service::where('unique_id',$id)->first();
        return view('admin.services.edit', compact('service'));
    }

    public function update(request $request){
        $st = Service::where('id', $request->id)->first();
        $st->service_name = $request->service_name;
        $st->service_order_type = $request->service_order_type;
        $st->base_fee = $request->base_fee;
        $st->rate_calculation_method = $request->rate_calculation_method;
        $st->duration_terms = $request->duration_terms;
        $st->cash_on_delivery = $request->cod;
        $st->peak_hours = $request->peak_hours;
        $st->restrict_service_area = $request->service_area;

        $st->save();

        return redirect()->route('admin.service.rate')->with('message', 'Saved successfully.');
    }
}
