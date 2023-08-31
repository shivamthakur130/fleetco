<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Renewal;
use Illuminate\Support\Str;

class RenewalController extends Controller
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
        $re = Renewal::get();
        return view('admin.renewals.list', compact('re'));
    }

    public function create(){
        return view('admin.renewals.add');
    }

    public function store(request $request){
        $validated = $request->validate([
            'renewal' => 'required',

        ]);
           
        $re = new Renewal;
        $re->unique_id = Str::random(40);
        $re->renewal = $request->renewal;
        $re->save();
    
        return redirect()->route('admin.renewals')->with('message', 'Renewal Saved successfully.');
    }

    public function destroy($id){
        $re = Renewal::where('id', $id)->first();
        $re->delete();
        return redirect()->route('admin.renewals')->with('error', 'Renewal Deleted successfully.');

    }

    public function edit($id){
        
        $re = Renewal::where('unique_id',$id)->first();
        return view('admin.renewals.edit', compact('re'));
    }

    public function update(request $request){
           
        $re = Renewal::where('id',$request->id)->first();
        $re->renewal = $request->renewal;
        $re->save();
        return redirect()->route('admin.renewals')->with('message', 'Renewal Update successfully.');
    }
}
