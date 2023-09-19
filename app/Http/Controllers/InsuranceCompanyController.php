<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InsuranceCompany;
use App\Models\country;
use Illuminate\Support\Str;

class InsuranceCompanyController extends Controller
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
        $insurances = InsuranceCompany::get();
        return view('admin.insurance.list', compact('insurances'));
    }
    public function create(){
        $insurances = InsuranceCompany::get();
        $countries = Country::get();
        return view('admin.insurance.add',compact('countries'));
    }

    public function store(request $request){
        $validated = $request->validate([
            'name' => 'required',
            'contact_name' => 'required',
        ]);
           
        $ic = new InsuranceCompany;
        $ic->unique_id = Str::random(40);
        $ic->name = $request->name;
        $ic->contact_name = $request->contact_name;
        $ic->contact_number = $request->cnumber;
        $ic->city = $request->city;
        $ic->country = $request->country;
        $ic->state = $request->state;
        $ic->address = $request->address;
        $ic->zip = $request->zip;
        $ic->save();
    
        return redirect()->route('admin.insurance')->with('message', 'Insurance Company Saved successfully.');
    }
    public function destroy($id){
        $ic = InsuranceCompany::where('id', $id)->first();
        $ic->delete();
        return redirect()->route('admin.insurance')->with('error', 'Insurance Company Deleted successfully.');

    }

    public function edit($id){    
        $ic = InsuranceCompany::where('unique_id',$id)->first();
        $countries = Country::get();
        return view('admin.insurance.edit', compact('ic','countries'));
    }

    public function update(request $request){
           
        $ic = InsuranceCompany::where('id',$request->id)->first();
        $ic->name = $request->name;
        $ic->contact_name = $request->contact_name;
        $ic->contact_number = $request->cnumber;
        $ic->city = $request->city;
        $ic->country = $request->country;
        $ic->state = $request->state;
        $ic->address = $request->address;
        $ic->zip = $request->zip;
        $ic->save();
        return redirect()->route('admin.insurance')->with('message', 'Insurance Company Update successfully.');
    }
}
