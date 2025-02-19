<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockIssue;
use Illuminate\Support\Str;
use App\Models\FleetType;
use App\Models\StockCode;
use App\Models\Fleet;
use App\Models\StockPurchase;
use Auth;


class StockIssueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stockCodes = StockCode::get();
        $fleetTypes = FleetType::get();
        $stockIssues = StockIssue::get();
        return view('admin.stock_issue.list', compact('stockCodes','fleetTypes','stockIssues'));
    }
    public function create(request $request){
        $fleetTypes = FleetType::get();
        $stockCodes = StockCode::get();
        $fleet = Fleet::get();
        return view('admin.stock_issue.add',compact('fleetTypes', 'stockCodes','fleet'));
    }
    public function getDetail($fleet){
        $data['vehicles'] = Fleet::where('fleet_type',$fleet)->select('id','plate_number')->get();
        return response()->json($data);
    }

    public function store(request $request){
        //dd($request->toArray());
        $validated = $request->validate([
            'fleet' => 'required',
            'date' => 'required',
        ]);
        //dd($request->toARray());   
        $st = new StockIssue;
        $st->unique_id = Str::random(40);
        $st->type = $request->type;
        $st->date = $request->date;
        $st->fleet = $request->fleet;
        $st->vehicle = $request->vehicle;
        $st->item_code = $request->item_code;
        $st->cost_code = $request->cost_code;
        $st->remarks = $request->remark;
        $st->rate = $request->rate;
        $st->qty = $request->qty;
        $st->in_stock = 0;
        $st->desc = $request->desc;
        $st->supplier = $request->supplier;
        $st->brand = $request->brand;
        $st->cost = $request->cost * $request->qty;
        $st->enterd_by = Auth::user()->name;
        $st->system_date = date('Y-m-d');
        $st->save();

        return redirect()->route('admin.stock.stock-issue')->with('message', 'Saved successfully.');
    }

    public function destroy($id){
        $sp = StockIssue::where('id', $id)->first();
        $sp->delete();
        return redirect()->route('admin.stock.stock-issue')->with('error', 'Deleted successfully.');

    }

    public function edit($id){
        $fleetTypes = FleetType::get();
        $stockCodes = StockCode::get();
        $fleet = Fleet::get();
        $issue = StockIssue::where('unique_id',$id)->first();
        return view('admin.stock_issue.edit', compact('issue','fleetTypes','stockCodes','fleet'));
    }

    public function update(request $request){
        $st = StockIssue::where('id', $request->id)->first();
        $st->type = $request->type;
        $st->date = $request->date;
        $st->fleet = $request->fleet;
        $st->vehicle = $request->vehicle;
        $st->item_code = $request->item_code;
        $st->cost_code = $request->cost_code;
        $st->remarks = $request->remark;
        $st->rate = $request->rate;
        $st->qty = $request->qty;
        $st->in_stock = 0;
        $st->desc = $request->desc;
        $st->supplier = $request->supplier;
        $st->brand = $request->brand;
        $st->cost = $request->cost * $request->qty;
        $st->enterd_by = Auth::user()->name;
        $st->system_date = date('Y-m-d');
        $st->save();

        return redirect()->route('admin.stock.stock-issue')->with('message', 'Update successfully.');
    }
}
