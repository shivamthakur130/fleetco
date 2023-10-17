<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Country;
use Illuminate\Support\Str;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::get();
        return view('admin.branches.list', compact('branches'));
    }

    public function create(request $request){
        return view('admin.branches.add');
    }
    public function store(request $request){
        $validated = $request->validate([
            'branch_type' => 'required',
           
        ]);
        //dd($request->toARray());   
        $branch = new Branch;
        $branch->unique_id = Str::random(40);
        $branch->branch_type = $request->branch_type;
        $branch->save();

        return redirect()->route('admin.branch')->with('message', 'Branch Saved successfully.');
    }
    public function edit($id){
        
        $branch = Branch::where('unique_id',$id)->first();
        return view('admin.branches.edit', compact('branch'));
    }

    public function update(request $request){
        $branch = Branch::where('id',$request->id)->first();
        $branch->branch_type = $request->branch_type;
        $branch->save();
    
        return redirect()->route('admin.branch')->with('message', 'Branch Update successfully.');
    }

    public function destroy($id){
        $branch = Branch::where('id', $id)->first();
        $branch->delete();
        return redirect()->route('admin.branch')->with('error', 'Branch Deleted successfully.');

    }
}
