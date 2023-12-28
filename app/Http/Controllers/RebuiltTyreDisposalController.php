<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\FleetType;
use App\Models\StockCode;
use App\Models\Fleet;
use App\Models\RebuiltTyreDisposal;
use Auth;

class RebuiltTyreDisposalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stockCodes = StockCode::get();
        $fleetTypes = FleetType::get();
        $RebuiltTyreDisposals = RebuiltTyreDisposal::get();
        return view('admin.rebuilt_tyre_disposal.list', compact('stockCodes','fleetTypes','RebuiltTyreDisposals'));
    }

    public function create(request $request){
        $fleetTypes = FleetType::get();
        $stockCodes = StockCode::get();
        $fleet = Fleet::get();
        return view('admin.rebuilt_tyre_disposal.add',compact('fleetTypes', 'stockCodes','fleet'));
    }

    public function store(request $request){
        //dd($request->toArray());
        $validated = $request->validate([
            'fleet' => 'required',
            'date' => 'required',
        ]);
        //dd($request->toARray());   
        $st = new RebuiltTyreDisposal;
        $st->unique_id = Str::random(40);
        $st->type = $request->type;
        $st->date = $request->date;
        $st->fleet = $request->fleet;
        $st->tyre_code = $request->tyre_code;
        $st->rate = $request->rate;
        $st->qty = $request->qty;
        $st->in_stock = 0;
        $st->desc = $request->desc;
        $st->supplier = $request->supplier;
        $st->brand = $request->brand;
        $st->value = $request->rate * $request->qty;
        $st->entered_by = Auth::user()->name;
        $st->system_date = date('Y-m-d');
        $st->save();

        return redirect()->route('admin.rebuilt.tyre.disposal')->with('message', 'Saved successfully.');
    }

    public function destroy($id){
        $sp = RebuiltTyreDisposal::where('id', $id)->first();
        $sp->delete();
        return redirect()->route('admin.rebuilt.tyre.disposal')->with('error', 'Deleted successfully.');

    }

    public function edit($id){
        $fleetTypes = FleetType::get();
        $stockCodes = StockCode::get();
        $fleet = Fleet::get();
        $issue = RebuiltTyreDisposal::where('unique_id',$id)->first();
        return view('admin.rebuilt_tyre_disposal.edit', compact('issue','fleetTypes','stockCodes','fleet'));
    }

    public function update(request $request){
        $st = RebuiltTyreDisposal::where('id', $request->id)->first();
        $st->type = $request->type;
        $st->date = $request->date;
        $st->fleet = $request->fleet;
        $st->tyre_code = $request->tyre_code;
        $st->rate = $request->rate;
        $st->qty = $request->qty;
        $st->in_stock = 0;
        $st->desc = $request->desc;
        $st->supplier = $request->supplier;
        $st->brand = $request->brand;
        $st->value = $request->rate * $request->qty;
        $st->entered_by = Auth::user()->name;
        $st->system_date = date('Y-m-d');
        $st->save();

        return redirect()->route('admin.rebuilt.tyre.disposal')->with('message', 'Update successfully.');
    }

}
