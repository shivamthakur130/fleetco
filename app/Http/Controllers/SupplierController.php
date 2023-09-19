<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Country;
use Illuminate\Support\Str;

class SupplierController extends Controller
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
        $suppliers = Supplier::get();
        return view('admin.suppliers.list', compact('suppliers'));
    }

    public function create()
    {   
        $countries = Country::get();
        return view('admin.suppliers.add',compact('countries'));
    }
    public function store(request $request){
        $validated = $request->validate([
            'supplier_name' => 'required',
            
        ]);
           
        $supplier = new Supplier;
        $supplier->unique_id = Str::random(40);
        $supplier->address = $request->address;
        $supplier->phone = $request->telephone;
        $supplier->remarks = $request->remark;
        $supplier->supplier_name = $request->supplier_name;
        $supplier->country = $request->country;
        $supplier->state = $request->state;
        $supplier->city = $request->city;
        $supplier->state = $request->state;
        $supplier->zip = $request->zip;
        $supplier->save();
    
        return redirect()->route('admin.suppliers')->with('message', 'Supplier Saved successfully.');
    }

    public function destroy($id){
        $supplier = Supplier::where('id', $id)->first();
        $supplier->delete();
        return redirect()->route('admin.suppliers')->with('error', 'Supplier Deleted successfully.');

    }

    public function edit($id){
        
        $supplier = Supplier::where('unique_id',$id)->first();
        $countries = Country::get();
        return view('admin.suppliers.edit', compact('supplier','countries'));
    }
    public function update(request $request){
        $validated = $request->validate([
            'supplier_name' => 'required',
            
        ]);
           
        $supplier = Supplier::where('id',$request->id)->first();
        $supplier->address = $request->address;
        $supplier->phone = $request->telephone;
        $supplier->remarks = $request->remark;
        $supplier->supplier_name = $request->supplier_name;
        $supplier->country = $request->country;
        $supplier->state = $request->state;
        $supplier->city = $request->city;
        $supplier->state = $request->state;
        $supplier->zip = $request->zip;
        $supplier->save();
    
        return redirect()->route('admin.suppliers')->with('message', 'Supplier Update successfully.');
    }
}
