<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyBranch;
use App\Models\Company;
use App\Models\Branch;
use App\Models\Country;
use Illuminate\Support\Str;

class CompanyBranchController extends Controller
{
    public function index()
    {
        $companies = CompanyBranch::get();
        return view('admin.company-branch.list', compact('companies'));
    }

    public function create(request $request){
        $branches = Branch::get();
        $companies = Company::get();
        $countries = Country::get();
        return view('admin.company-branch.add',compact('countries','branches','companies'));
    }

    public function store(request $request){
        //dd($request->toarray());
        $validated = $request->validate([
            'branch_eid' => 'required',
            'branch_name' => 'required',
            'branch_email' =>  'required'
        ]);
        //dd($request->toARray());   
        $company = new CompanyBranch;
        $company->unique_id = Str::random(40);
        $company->branch_eid = $request->branch_eid;
        $company->branch_name = $request->branch_name;
        $company->branch_email = $request->branch_email;
        $company->branch_type = $request->branch_type;
        $company->street = $request->street;
        $company->branch_contact = $request->branch_contact;
        $company->company_id = $request->company_id;
        $company->city = $request->city;
        $company->state = $request->state;
        $company->country = $request->country;
        $company->zip = $request->postal_code;
        $company->remainders = $request->remainder;

        $company->save();

        return redirect()->route('admin.company.branch')->with('message', 'Company Branch Saved successfully.');
    }

    public function edit($id){
        
        $companyBranch = CompanyBranch::where('unique_id',$id)->first();
        $countries = Country::get();
        $branches = Branch::get();
        $companies = Company::get();
        return view('admin.company-branch.edit', compact('companies','countries','companyBranch','branches'));
    }

    public function update(request $request){
        //dd($request->toarray());
        $company = CompanyBranch::where('id',$request->id)->first();
        $company->unique_id = Str::random(40);
        $company->branch_eid = $request->branch_eid;
        $company->branch_name = $request->branch_name;
        $company->branch_email = $request->branch_email;
        $company->branch_type = $request->branch_type;
        $company->street = $request->street;
        $company->branch_contact = $request->branch_contact;
        $company->company_id = $request->company_id;
        $company->city = $request->city;
        $company->state = $request->state;
        $company->country = $request->country;
        $company->zip = $request->postal_code;
        $company->remainders = $request->remainder;
        $company->save();
    
        return redirect()->route('admin.company.branch')->with('message', 'Company Branch Update successfully.');
    }


    public function destroy($id){
        $company = CompanyBranch::where('id', $id)->first();
        $company->delete();
        return redirect()->route('admin.company.branch')->with('error', 'Company Branch Deleted successfully.');

    }
}
