<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\FleetType;
use App\Models\StockCode;
use App\Models\Fleet;
use App\Models\RebuiltReceipt;
use Auth;

class RebuiltReceiptController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stockCodes = StockCode::get();
        $fleetTypes = FleetType::get();
        $RebuiltReceipts = RebuiltReceipt::get();

        return view('admin.rebuilt_receipt.list', compact('stockCodes','fleetTypes','RebuiltReceipts'));
    }

    public function create(request $request){
        $fleetTypes = FleetType::get();
        $stockCodes = StockCode::get();
        $fleet = Fleet::get();
        return view('admin.rebuilt_receipt.add',compact('fleetTypes', 'stockCodes','fleet'));
    }

    public function store(request $request){
        //dd($request->toArray());
        $validated = $request->validate([
            'fleet' => 'required',
            'date' => 'required',
        ]);
        //dd($request->toARray());   
        $st = new RebuiltReceipt;
        $st->unique_id = Str::random(40);
        $st->type = $request->type;
        $st->date = $request->date;
        $st->fleet = $request->fleet;
        $st->po_ref = $request->po;
        $st->tyre_code = $request->tyre_code;
        $st->unit_cost = $request->unit_cost;
        $st->qty = $request->qty;
        $st->desc = $request->desc;
        $st->supplier = $request->supplier;
        $st->brand = $request->brand;
        // $st->in_stock = 0;
        $st->cost = $request->unit_cost * $request->qty;
        $st->entered_by = Auth::user()->name;
        $st->system_date = date('Y-m-d');
        $st->save();

        return redirect()->route('admin.rebuilt.receipt')->with('message', 'Saved successfully.');
    }

    public function destroy($id){
        $sp = RebuiltReceipt::where('id', $id)->first();
        $sp->delete();
        return redirect()->route('admin.rebuilt.receipt')->with('error', 'Deleted successfully.');
    }
    public function edit($id){
        $fleetTypes = FleetType::get();
        $stockCodes = StockCode::get();
        $fleet = Fleet::get();
        $receipt = RebuiltReceipt::where('unique_id',$id)->first();
        return view('admin.rebuilt_receipt.edit', compact('fleetTypes','stockCodes','fleet','receipt'));
    }

    public function update(request $request){
        $st = RebuiltReceipt::where('id', $request->id)->first();
        $st->type = $request->type;
        $st->date = $request->date;
        $st->fleet = $request->fleet;
        $st->po_ref = $request->po;
        $st->tyre_code = $request->tyre_code;
        $st->unit_cost = $request->unit_cost;
        $st->qty = $request->qty;
        $st->desc = $request->desc;
        $st->supplier = $request->supplier;
        $st->brand = $request->brand;
        // $st->in_stock = 0;
        $st->cost = $request->unit_cost * $request->qty;
        $st->entered_by = Auth::user()->name;
        $st->system_date = date('Y-m-d');
        $st->save();

        return redirect()->route('admin.rebuilt.receipt')->with('message', 'Update successfully.');
    }
}
