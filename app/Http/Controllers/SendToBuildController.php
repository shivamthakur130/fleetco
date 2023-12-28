<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\FleetType;
use App\Models\StockCode;
use App\Models\Fleet;
use App\Models\SendToBuild;
use Auth;

class SendToBuildController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stockCodes = StockCode::get();
        $fleetTypes = FleetType::get();
        $SendToBuilds = SendToBuild::get();

        return view('admin.send_to_build.list', compact('stockCodes','fleetTypes','SendToBuilds'));
    }

    public function create(request $request){
        $fleetTypes = FleetType::get();
        $stockCodes = StockCode::get();
        $fleet = Fleet::get();
        return view('admin.send_to_build.add',compact('fleetTypes', 'stockCodes','fleet'));
    }

    public function store(request $request){
        //dd($request->toArray());
        $validated = $request->validate([
            'fleet' => 'required',
            'date' => 'required',
        ]);
        //dd($request->toARray());   
        $st = new SendToBuild;
        $st->unique_id = Str::random(40);
        $st->type = $request->type;
        $st->date = $request->date;
        $st->fleet = $request->fleet;
        $st->po_number = $request->po;
        $st->tyre_code = $request->tyre_code;
        $st->rate = $request->rate;
        $st->qty = $request->qty;
        $st->desc = $request->desc;
        $st->supplier = $request->supplier;
        $st->brand = $request->brand;
        $st->in_stock = 0;
        $st->cost = $request->rate * $request->qty;
        $st->enterd_by = Auth::user()->name;
        $st->system_date = date('Y-m-d');
        $st->save();

        return redirect()->route('admin.send.to.build')->with('message', 'Saved successfully.');
    }

    public function destroy($id){
        $sp = SendToBuild::where('id', $id)->first();
        $sp->delete();
        return redirect()->route('admin.send.to.build')->with('error', 'Deleted successfully.');
    }
    public function edit($id){
        $fleetTypes = FleetType::get();
        $stockCodes = StockCode::get();
        $fleet = Fleet::get();
        $send = SendToBuild::where('unique_id',$id)->first();
        return view('admin.send_to_build.edit', compact('fleetTypes','stockCodes','fleet','send'));
    }

    public function update(request $request){
        $st = SendToBuild::where('id', $request->id)->first();
        $st->date = $request->date;
        $st->fleet = $request->fleet;
        $st->po_number = $request->po;
        $st->tyre_code = $request->tyre_code;
        $st->rate = $request->rate;
        $st->qty = $request->qty;
        $st->desc = $request->desc;
        $st->supplier = $request->supplier;
        $st->brand = $request->brand;
        $st->in_stock = 0;
        $st->cost = $request->rate * $request->qty;
        $st->enterd_by = Auth::user()->name;
        $st->system_date = date('Y-m-d');
        $st->save();

        return redirect()->route('admin.send.to.build')->with('message', 'Update successfully.');
    }
}
