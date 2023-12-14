<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FleetType;
use App\Models\StockCode;
use App\Models\Disposal;
use App\Models\Fleet;
use Illuminate\Support\Str;
use Auth;

class DisposalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stockCodes = StockCode::get();
        $fleetTypes = FleetType::get();
        $disposals = Disposal::get();
        return view('admin.disposals.list', compact('stockCodes','fleetTypes','disposals'));
    }
    public function create(request $request){
        $fleetTypes = FleetType::get();
        $stockCodes = StockCode::get();
        $fleet = Fleet::get();
        return view('admin.disposals.add',compact('fleetTypes', 'stockCodes','fleet'));
    }
    public function store(request $request){
        //dd($request->toArray());
        $validated = $request->validate([
            'fleet' => 'required',
            'date' => 'required',
        ]);
        //dd($request->toARray());   
        $st = new Disposal;
        $st->unique_id = Str::random(40);
        $st->type = $request->type;
        $st->date = $request->date;
        $st->fleet = $request->fleet;
        $st->item_code = $request->item_code;
        $st->rate = $request->rate;
        $st->qty = $request->qty;
        $st->in_stock = 0;
        $st->desc = $request->desc;
        $st->supplier = $request->supplier;
        $st->brand = $request->brand;
        $st->value = $request->rate * $request->qty;
        $st->enterd_by = Auth::user()->name;
        $st->system_date = date('Y-m-d');
        $st->save();

        return redirect()->route('admin.stock.disposals')->with('message', 'Saved successfully.');
    }
    public function destroy($id){
        $sp = Disposal::where('id', $id)->first();
        $sp->delete();
        return redirect()->route('admin.stock.disposals')->with('error', 'Deleted successfully.');

    }

    public function edit($id){
        $fleetTypes = FleetType::get();
        $stockCodes = StockCode::get();
        $fleet = Fleet::get();
        $disposal = Disposal::where('unique_id',$id)->first();
        return view('admin.disposals.edit', compact('fleet','fleetTypes','stockCodes','disposal'));
    }
    public function update(request $request){
        $st = Disposal::where('id', $request->id)->first();
        $st->type = $request->type;
        $st->date = $request->date;
        $st->fleet = $request->fleet;
        $st->item_code = $request->item_code;
        $st->rate = $request->rate;
        $st->qty = $request->qty;
        $st->in_stock = 0;
        $st->desc = $request->desc;
        $st->supplier = $request->supplier;
        $st->brand = $request->brand;
        $st->value = $request->rate * $request->qty;
        $st->enterd_by = Auth::user()->name;
        $st->system_date = date('Y-m-d');
        $st->save();

        return redirect()->route('admin.stock.disposals')->with('message', 'Update successfully.');
    }
}
