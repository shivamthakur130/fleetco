<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Country;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::get();
        return view('admin.companies.list', compact('companies'));
    }

    public function create(request $request){
        $countries = Country::get();
        return view('admin.companies.add',compact('countries'));
    }

    public function store(request $request){
        $validated = $request->validate([
            'company_eid' => 'required',
            'company_email' =>  'required',
            'company_name' => 'required',
        ]);
        //dd($request->toARray());   
        $company = new Company;
        $company->unique_id = Str::random(40);
        $company->company_eid = $request->company_eid;
        $company->company_name = $request->company_name;
        $company->email = $request->company_email;
        $company->street = $request->street;
        $company->street_2 = $request->street_2;
        $company->contact = $request->company_phone_number;
        $company->city = $request->city;
        $company->state = $request->state;
        $company->country = $request->country;
        $company->zip = $request->postal_code;
        $company->remainders = $request->remainder;
        $company->save();

        return redirect()->route('admin.company')->with('message', 'Company Saved successfully.');
    }

    public function edit($id){
        
        $company = Company::where('unique_id',$id)->first();
        $countries = Country::get();
        return view('admin.companies.edit', compact('company','countries'));
    }

    public function update(request $request){
       // dd($request->toArray());
        $company = Company::where('id',$request->id)->first();
        $company->company_eid = $request->company_eid;
        $company->email = $request->company_email;
        $company->company_name = $request->company_name;
        $company->street = $request->street;
        $company->contact = $request->company_phone_number;
        $company->city = $request->city;
        $company->state = $request->state;
        $company->street_2 = $request->street_2;
        $company->country = $request->country;
        $company->zip = $request->postal_code;
        $company->remainders = $request->remainder;
        $company->save();
    
        return redirect()->route('admin.company')->with('message', 'Company Update successfully.');
    }

    public function destroy($id){
        $company = Company::where('id', $id)->first();
        $company->delete();
        return redirect()->route('admin.company')->with('error', 'Company Deleted successfully.');

    }


}
