<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $products = Product::where('status','active')->latest()->paginate(5);
        $cartNumber = Cart::count();
        $productImage = ProductImages::all();
        return view('home.userpage',compact('products','productImage','cartNumber'));
    }
    public function product_details($id){
        $product = Product::find($id);
        $productImage = ProductImages::where('product_id',$id)->first();
        return view('home.product_detail',compact('product','productImage'));
    }
}
