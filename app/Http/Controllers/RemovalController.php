<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Removal;
use Illuminate\Support\Str;
use App\Models\FleetType;
use App\Models\StockCode;
use App\Models\Fleet;
use Auth;

class RemovalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stockCodes = StockCode::get();
        $fleetTypes = FleetType::get();
        $removals = Removal::get();
        return view('admin.removals.list', compact('stockCodes','fleetTypes','removals'));
    }

    public function create(request $request){
        $fleetTypes = FleetType::get();
        $stockCodes = StockCode::get();
        $fleet = Fleet::get();
        return view('admin.removals.add',compact('fleetTypes', 'stockCodes','fleet'));
    }

    public function store(request $request){
        //dd($request->toArray());
        $validated = $request->validate([
            'fleet' => 'required',
            'date' => 'required',
        ]);
        //dd($request->toARray());   
        $st = new Removal;
        $st->unique_id = Str::random(40);
        $st->type = $request->type;
        $st->date = $request->date;
        $st->fleet = $request->fleet;
        $st->vehicle = $request->vehicle;
        $st->item_code = $request->item_code;
        $st->unit_cost = $request->unit_cost;
        $st->qty = $request->qty;
        $st->desc = $request->desc;
        $st->supplier = $request->supplier;
        $st->brand = $request->brand;
        $st->cost = $request->unit_cost * $request->qty;
        $st->enterd_by = Auth::user()->name;
        $st->system_date = date('Y-m-d');
        $st->save();

        return redirect()->route('admin.stock.removals')->with('message', 'Saved successfully.');
    }

    public function destroy($id){
        $sp = Removal::where('id', $id)->first();
        $sp->delete();
        return redirect()->route('admin.stock.removals')->with('error', 'Deleted successfully.');

    }
    public function edit($id){
        $fleetTypes = FleetType::get();
        $stockCodes = StockCode::get();
        $fleet = Fleet::get();
        $removal = Removal::where('unique_id',$id)->first();
        return view('admin.removals.edit', compact('removal','fleetTypes','stockCodes','fleet'));
    }

    public function update(request $request){
        $st = Removal::where('id', $request->id)->first();
        $st->type = $request->type;
        $st->date = $request->date;
        $st->fleet = $request->fleet;
        $st->vehicle = $request->vehicle;
        $st->item_code = $request->item_code;
        $st->unit_cost = $request->unit_cost;
        $st->qty = $request->qty;
        $st->desc = $request->desc;
        $st->supplier = $request->supplier;
        $st->brand = $request->brand;
        $st->cost = $request->unit_cost * $request->qty;
        $st->enterd_by = Auth::user()->name;
        $st->system_date = date('Y-m-d');
        $st->save();

        return redirect()->route('admin.stock.removals')->with('message', 'Update successfully.');
    }
}
