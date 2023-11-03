<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\ModuleOperation;


class PermissionController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        $modules = ModuleOperation::get();
        
        //dd($modules->toArray());
        return view('admin.permissions.list',compact('roles','modules'));
    }

    public function changePermission(request $request){
        //dd($request->toArray());
        
        $roleConfig = ModuleOperation::where(['role_id' => $request->roleId,'module' =>$request->moduleName,'sub_module'=>$request->submodule ])->first();
        $prop = $request->fieldType;
        //echo $roleConfig->$abc;
        //dd($roleConfig->toArray());
        if($roleConfig){
            if($roleConfig->$prop == 'y' )
            {   
                $roleConfig->$prop = 'n';
            }else{
                // echo "dsd"; 
                $roleConfig->$prop = 'y';
            }
        }
        $roleConfig->save();
            return json_encode(array('statusCode'=>200));
    }
}
