<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
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
    public function addUser()
    {
        $roles = Role::get();
        return view('admin.users.user-form', compact('roles'));
    }

    public function saveUser(request $request){
        //dd($request->toArray());
        $validated = $request->validate([
            'username' => 'required',
            'fullname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
           
        $user = new User;
        $user->unique_id = Str::random(40);
        $user->username = $request->username;
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->roles()->sync($request->roles);  
        return redirect()->route('admin-area')->with('message', 'User Saved successfully.');
    }

    public function editUser($id){
        $user = User::with('roles')->where('unique_id' , $id)->first();
        $roles = Role::get();
        return view('admin.users.user-edit-form', compact('roles','user'));
        //dd($user->toArray());
    }

    public function updateUser(request $request){
        $user = User::where('unique_id' ,$request->id)->first();
        $user->username = $request->username;
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->save();
        $user->roles()->sync($request->roles);  
        return redirect()->route('admin-area')->with('message', 'User Updated successfully.');
    }

    public function deleteUser($id){
        $user = User::where('unique_id', $id)->first();
        $user->delete();
        return redirect()->route('admin-area')->with('error', 'User Deleted successfully.');

    }
}
