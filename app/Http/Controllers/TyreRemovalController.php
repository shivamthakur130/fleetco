<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\FleetType;
use App\Models\StockCode;
use App\Models\Fleet;
use App\Models\TyreRemoval;
use Auth;

class TyreRemovalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stockCodes = StockCode::get();
        $fleetTypes = FleetType::get();
        $tyreRemovals = TyreRemoval::get();

        return view('admin.tyre_removal.list', compact('stockCodes','fleetTypes','tyreRemovals'));
    }

    public function create(request $request){
        $fleetTypes = FleetType::get();
        $stockCodes = StockCode::get();
        $fleet = Fleet::get();
        return view('admin.tyre_removal.add',compact('fleetTypes', 'stockCodes','fleet'));
    }

    public function store(request $request){
        //dd($request->toArray());
        $validated = $request->validate([
            'fleet' => 'required',
            'date' => 'required',
        ]);
        //dd($request->toARray());   
        $st = new TyreRemoval;
        $st->unique_id = Str::random(40);
        $st->type = $request->type;
        $st->date = $request->date;
        $st->fleet = $request->fleet;
        $st->vehicle = $request->vehicle;
        $st->tyre_code = $request->tyre_code;
        $st->unit_cost = $request->unit_cost;
        $st->qty = $request->qty;
        $st->desc = $request->desc;
        $st->supplier = $request->supplier;
        $st->brand = $request->brand;
        $st->cost = $request->unit_cost * $request->qty;
        $st->enterd_by = Auth::user()->name;
        $st->system_date = date('Y-m-d');
        $st->save();

        return redirect()->route('admin.rebuilt.tyre.removal')->with('message', 'Saved successfully.');
    }

    public function destroy($id){
        $sp = TyreRemoval::where('id', $id)->first();
        $sp->delete();
        return redirect()->route('admin.rebuilt.tyre.removal')->with('error', 'Deleted successfully.');
    }
    public function edit($id){
        $fleetTypes = FleetType::get();
        $stockCodes = StockCode::get();
        $fleet = Fleet::get();
        $tyre = TyreRemoval::where('unique_id',$id)->first();
        return view('admin.tyre_removal.edit', compact('fleetTypes','stockCodes','fleet','tyre'));
    }

    public function update(request $request){
        $st = TyreRemoval::where('id', $request->id)->first();
        $st->type = $request->type;
        $st->date = $request->date;
        $st->fleet = $request->fleet;
        $st->vehicle = $request->vehicle;
        $st->tyre_code = $request->tyre_code;
        $st->unit_cost = $request->unit_cost;
        $st->qty = $request->qty;
        $st->desc = $request->desc;
        $st->supplier = $request->supplier;
        $st->brand = $request->brand;
        $st->cost = $request->unit_cost * $request->qty;
        $st->enterd_by = Auth::user()->name;
        $st->system_date = date('Y-m-d');
        $st->save();

        return redirect()->route('admin.rebuilt.tyre.removal')->with('message', 'Update successfully.');
    }
}
