<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockCode;
use App\Models\Supplier;
use Illuminate\Support\Str;

class StockCodeController extends Controller
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
        $sc = StockCode::get();
        $suppliers = Supplier::get();
        return view('admin.stock_codes.list', compact('suppliers','sc'));
    }

    public function create()
    {   
        $suppliers = Supplier::get();
        return view('admin.stock_codes.add', compact('suppliers'));
    }

    public function store(request $request){
        $validated = $request->validate([
            'item_id' => 'required',
            'supplier' =>'required',
            'brand' => 'required',
        ]);
           
        $sc = new StockCode;
        $sc->unique_id = Str::random(40);
        $sc->item_id = $request->item_id;
        $sc->brand = $request->brand;
        $sc->description = $request->description;
        $sc->supplier = $request->supplier;
        $sc->save();
    
        return redirect()->route('admin.stock-code')->with('message', 'Stcok Code Saved successfully.');
    }

    public function edit($id){
        
        $sc = StockCode::where('unique_id',$id)->first();
        $suppliers = Supplier::get();
        return view('admin.stock_codes.edit', compact('sc','suppliers'));
    }

    public function destroy($id){
        $sc = StockCode::where('id', $id)->first();
        $sc->delete();
        return redirect()->route('admin.stock-code')->with('error', 'Stock Code Deleted successfully.');

    }

    public function update(request $request){
           
        $sc = StockCode::where('id',$request->id)->first();
        $sc->item_id = $request->item_id;
        $sc->brand = $request->brand;
        $sc->description = $request->description;
        $sc->supplier = $request->supplier;
        $sc->save();
    
        return redirect()->route('admin.stock-code')->with('message', 'Stock Code Update successfully.');
    }
}
