<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\FleetType;
use App\Models\StockCode;
use App\Models\Fleet;
use App\Models\RebuiltIssue;
use Auth;

class RebuiltIssueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stockCodes = StockCode::get();
        $fleetTypes = FleetType::get();
        $RebuiltIssues = RebuiltIssue::get();
        return view('admin.rebuilt_issue.list', compact('stockCodes','fleetTypes','RebuiltIssues'));
    }
    public function create(request $request){
        $fleetTypes = FleetType::get();
        $stockCodes = StockCode::get();
        $fleet = Fleet::get();
        return view('admin.rebuilt_issue.add',compact('fleetTypes', 'stockCodes','fleet'));
    }

    public function store(request $request){
        //dd($request->toArray());
        $validated = $request->validate([
            'fleet' => 'required',
            'date' => 'required',
        ]);
        //dd($request->toARray());   
        $st = new RebuiltIssue;
        $st->unique_id = Str::random(40);
        $st->type = $request->type;
        $st->date = $request->date;
        $st->fleet = $request->fleet;
        $st->vehicle = $request->vehicle;
        $st->item_code = $request->item_code;
        $st->cost_code = $request->cost_code;
        $st->remarks = $request->remark;
        $st->unit_cost = $request->unit_cost;
        $st->qty = $request->qty;
        //$st->in_stock = 0;
        $st->desc = $request->desc;
        $st->supplier = $request->supplier;
        $st->brand = $request->brand;
        $st->cost = $request->cost * $request->qty;
        $st->enterd_by = Auth::user()->name;
        $st->system_date = date('Y-m-d');
        $st->save();

        return redirect()->route('admin.rebuilt.issue')->with('message', 'Saved successfully.');
    }

    public function destroy($id){
        $sp = RebuiltIssue::where('id', $id)->first();
        $sp->delete();
        return redirect()->route('admin.rebuilt.issue')->with('error', 'Deleted successfully.');

    }
    public function edit($id){
        $fleetTypes = FleetType::get();
        $stockCodes = StockCode::get();
        $fleet = Fleet::get();
        $issue = RebuiltIssue::where('unique_id',$id)->first();
        return view('admin.rebuilt_issue.edit', compact('issue','fleetTypes','stockCodes','fleet'));
    }

    public function update(request $request){
        $st = RebuiltIssue::where('id', $request->id)->first();
        $st->type = $request->type;
        $st->date = $request->date;
        $st->fleet = $request->fleet;
        $st->vehicle = $request->vehicle;
        $st->item_code = $request->item_code;
        $st->cost_code = $request->cost_code;
        $st->remarks = $request->remark;
        $st->unit_cost = $request->unit_cost;
        $st->qty = $request->qty;
        //$st->in_stock = 0;
        $st->desc = $request->desc;
        $st->supplier = $request->supplier;
        $st->brand = $request->brand;
        $st->cost = $request->cost * $request->qty;
        $st->enterd_by = Auth::user()->name;
        $st->system_date = date('Y-m-d');
        $st->save();

        return redirect()->route('admin.rebuilt.issue')->with('message', 'Update successfully.');
    }
}
