<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

}
