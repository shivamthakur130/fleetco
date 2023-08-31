<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use Illuminate\Support\Str;

class ModuleController extends Controller
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
        $modules = Module::get();
        return view('admin.module.list', compact('modules'));
    }

    public function addModule()
    {
        return view('admin.module.add');
    }

    public function saveModule(request $request){
        //dd($request->toArray());
        $validated = $request->validate([
            'module' => 'required',
            
        ]);
           
        $module = new Module;
        $module->unique_id = Str::random(40);
        $module->name = $request->module;
        $module->save();
    
        return redirect()->route('admin-area.module')->with('message', 'Module Saved successfully.');
    }

    public function deleteModule($id){
        $module = Module::where('id', $id)->first();
        $module->delete();
        return redirect()->route('admin-area.module')->with('error', 'Module Deleted successfully.');

    }

    public function editModule($id){
        
        $module = Module::where('id',$id)->first();
        return view('admin.module.edit', compact('module'));
    }

    public function updateModule(request $request){
        $module = Module::where('id' ,$request->id)->first();
        $module->name = $request->module;
        $module->save();
    
        return redirect()->route('admin-area.module')->with('message', 'Module Updated successfully.');
    }
}
