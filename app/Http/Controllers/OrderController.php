<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        $user = User::all();
        return view('admin.cart',compact('orders','user'));
    }
// for my oder details
    public function myOrder(){
        $userId = Auth::user()->id;
        $orderDetails = Order::where('user_id',$userId)->get();
        return view('home.myOrder',compact('userId','orderDetails'));
    }

    public function editOrder($id){
        $orderDetails = Order::find($id);
        return view('admin.editOrder',compact('orderDetails'));
    }
}
