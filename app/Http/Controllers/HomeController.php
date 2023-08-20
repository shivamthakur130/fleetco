<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $user = Auth::user();
       
        $userData = User::with('roles')->where('unique_id',$user->unique_id)->first();
        $user_type = $userData->roles->first()->label;
        //dd($user_type);
        $users = User::get();
        $roles = Role::get();

        if($user_type == 'Admin'){
            return view('dashboard',compact('users','roles'));
        }
        else
            return view('users.dashboard',compact('users','roles'));
    }

    public function userProfile(){
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        return view('users.profile', compact('user'));
    }

    public function userProfileUpdate(request $request){
        $user = User::where('unique_id' ,$request->id)->first();
        $user->username = $request->username;
        $user->name = $request->fullname;
        $user->email = $request->email;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        
        $user->save(); 
        return redirect()->route('user.profile')->with('message', 'User Updated successfully.');
    }
    
    public function adminProfile(){
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        return view('admin.profile', compact('user'));
    }

    public function adminProfileUpdate(request $request){
        $user = User::where('unique_id' ,$request->id)->first();
        $user->username = $request->username;
        $user->name = $request->fullname;
        $user->email = $request->email;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        
        $user->save(); 
        return redirect()->route('admin.profile')->with('message', 'User Updated successfully.');
    }

    public function adminArea(){
        $users= User::with('roles')->get();
        return view('admin.users.user-list', compact('users'));
    }
}
