<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Str;

class GroupController extends Controller
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
        $roles = Role::get();
        return view('admin.group.list', compact('roles'));
    }

    public function addGroup()
    {
        return view('admin.group.add');
    }

    public function saveGroup(request $request){
        //dd($request->toArray());
        $validated = $request->validate([
            'group' => 'required',
            
        ]);
           
        $group = new Role;
        $group->unique_id = Str::random(40);
        $group->label = $request->group;
        $group->name = $request->group;
        $group->save();
    
        return redirect()->route('admin-area.group')->with('message', 'Group Saved successfully.');
    }

    public function deleteGroup($id){
        $role = Role::where('id', $id)->first();
        $role->delete();
        return redirect()->route('admin-area.group')->with('error', 'Group Deleted successfully.');

    }

    public function editGroup($id){
        
        $role = Role::where('id',$id)->first();
        return view('admin.group.edit', compact('role'));
    }

    public function updateGroup(request $request){
        $group = Role::where('id' ,$request->id)->first();
        $group->label = $request->group;
        $group->name = $request->group;
        $group->save();
    
        return redirect()->route('admin-area.group')->with('message', 'Group Updated successfully.');
    }

}
