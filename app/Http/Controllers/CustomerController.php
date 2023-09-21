<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Country;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::get();
        return view('admin.customers.list', compact('customers'));
    }

    public function create(request $request){
        $countries = Country::get();
        return view('admin.customers.add',compact('countries'));
    }

    public function store(request $request){
        $validated = $request->validate([
            'customer_name' => 'required',
            'email' =>  'required'
        ]);
        //dd($request->toARray());   
        $customer = new Customer;
        $customer->unique_id = Str::random(40);
        $customer->name = $request->customer_name;
        $customer->email = $request->email;
        $customer->street_1 = $request->street_1;
        $customer->street_2 = $request->street_2;
        $customer->phone = $request->phone_number;
        $customer->neighbour = $request->neighbour;
        $customer->building = $request->building;
        $customer->security_access = $request->security_access;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->country = $request->country;
        $customer->postal_code = $request->postal_code;
        $customer->lat = $request->lat;    
        $customer->lang = $request->lang;
        $customer->save();

        return redirect()->route('admin.customer')->with('message', 'Customer Saved successfully.');
    }

    public function destroy($id){
        $customer = Customer::where('id', $id)->first();
        $customer->delete();
        return redirect()->route('admin.customer')->with('error', 'Customer Deleted successfully.');

    }
    public function edit($id){
        
        $customer = Customer::where('unique_id',$id)->first();
        $countries = Country::get();
        return view('admin.customers.edit', compact('customer','countries'));
    }

    public function update(request $request ){
        $customer = Customer::where('id',$request->id)->first();
        
        $customer->unique_id = Str::random(40);
        $customer->name = $request->customer_name;
        $customer->email = $request->email;
        $customer->street_1 = $request->street_1;
        $customer->street_2 = $request->street_2;
        $customer->phone = $request->phone_number;
        $customer->neighbour = $request->neighbour;
        $customer->building = $request->building;
        $customer->security_access = $request->security_access;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->country = $request->country;
        $customer->postal_code = $request->postal_code;
        $customer->lat = $request->lat;    
        $customer->lang = $request->lang;
        
        $customer->save();
    
        return redirect()->route('admin.customer')->with('message', 'Customer Update successfully.');
    }
}
