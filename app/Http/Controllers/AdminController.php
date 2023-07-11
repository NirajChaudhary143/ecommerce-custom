<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index(){
        $user = Auth::user();
        // echo "<pre>";
        // print_r($user->roles->pluck('name')->toArray());
        if($user->roles->contains('name','user')){
            return redirect('/');
        }
        elseif ($user->roles->contains('name','owner')) {
            return redirect('/admin-panel');
        }
    }
    public function admin(){
        return view('admin.adminPanel');
    }
    public function storeUser(){
        $user = Auth::user();
        $roles = Role::all();
        return view('admin.storeUser',compact('user','roles'));
    }
    public function category(){
        
        return view('admin.category');
    }

}
