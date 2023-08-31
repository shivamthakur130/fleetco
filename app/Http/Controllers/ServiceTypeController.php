<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceType;
use Illuminate\Support\Str;

class ServiceTypeController extends Controller
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
        $st = ServiceType::get();
        return view('admin.service_type.list', compact('st'));
    }

    public function create(){
        return view('admin.service_type.add');
    }

    public function store(request $request){
        $validated = $request->validate([
            'service_type' => 'required',

        ]);
           
        $st = new ServiceType;
        $st->unique_id = Str::random(40);
        $st->service_type = $request->service_type;
        $st->save();
    
        return redirect()->route('admin.service_type')->with('message', 'Service Type Saved successfully.');
    }

    public function destroy($id){
        $st = ServiceType::where('id', $id)->first();
        $st->delete();
        return redirect()->route('admin.service_type')->with('error', 'Service Type Deleted successfully.');

    }

    public function edit($id){
        
        $st = ServiceType::where('unique_id',$id)->first();
        return view('admin.service_type.edit', compact('st'));
    }

    public function update(request $request){
           
        $st = ServiceType::where('id',$request->id)->first();
        $st->service_type = $request->service_type;
        $st->save();
    
        return redirect()->route('admin.service_type')->with('message', 'Service Type Update successfully.');
    }
}
