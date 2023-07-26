<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class roleController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        return view('rolesAndPermission.permission',compact('permissions'));
    }

    public function viewPermissionForm(){
        return view('rolesAndPermission.permissionForm');
    }
}

