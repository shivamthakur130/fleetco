<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FleetType;
use App\Models\StockCode;
use App\Models\StockPurchase;
use Illuminate\Support\Str;
use Auth;

class StockPurchaseController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stockCodes = StockCode::get();
        $fleetTypes = FleetType::get();
        $stockPurchase = StockPurchase::get();
        return view('admin.stock_purchase.list', compact('stockCodes','fleetTypes','stockPurchase'));
    }

    public function create(request $request){
        $fleetTypes = FleetType::get();
        $stockCodes = StockCode::get();

        return view('admin.stock_purchase.add',compact('fleetTypes', 'stockCodes'));
    }
    public function getDetail($id){
        $stockCodes = StockCode::where('id',$id)->first();
        return response()->json($stockCodes);
    }

    public function store(request $request){
        //dd($request->toArray());
        $validated = $request->validate([
            'item_code' => 'required',
            'unit_cost' => 'required',
        ]);
        //dd($request->toARray());   
        $st = new StockPurchase;
        $st->unique_id = Str::random(40);
        $st->type = $request->type;
        $st->date = $request->date;
        $st->fleet_type = $request->fleet;
        $st->item_code = $request->item_code;
        $st->unit_cost = $request->unit_cost;
        $st->po_ref = $request->po_ref;
        $st->brand = $request->brand;
        $st->desc = $request->desc;
        $st->supplier = $request->supplier;
        $st->qty = $request->qty;
        $st->cost = $request->unit_cost * $request->qty;
    
        $st->enterd_by = Auth::user()->name;
        $st->system_date = date('Y-m-d');
        $st->save();

        return redirect()->route('admin.stock.stock-purchase')->with('message', 'Saved successfully.');
    }
}
