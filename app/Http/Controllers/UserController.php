<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(5);
        $productImage = ProductImages::all();
        return view('home.userpage',compact('products','productImage'));
    }
    public function product_details($id){
        $product = Product::find($id);
        $productImage = ProductImages::where('product_id',$id)->first();
        return view('home.product_detail',compact('product','productImage'));
    }
}
