<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request,$id){
        // print_r($request->toArray());
        $product = Product::find($id);
        $productImage = ProductImages::where('product_id',$id)->first();
        $userId = Auth::user()->id;
        $cart =new Cart();
        $cart->username = $userId;
        $cart->product_title = $product->product_title;
        $cart->selling_price = $product->selling_price;
        $sellingPrice = $product->selling_price;
        $totlaPrice = $request['product_quantity']*$sellingPrice;
        $cart->total_price = $totlaPrice;
        $cart->product_quantity = $request['product_quantity'];
        $cart->product_image = 'uploads/products/'.$productImage->name;
        $cart->save();

        return redirect('/display-carts');
    }

    public function dispalyCart(){
        $userId = Auth::user()->id;
        $carts = Cart::where('username',$userId)->get();
        return view('home.displayCarts',compact('carts'));
    }
    public function deleteCarts($id){
        Cart::find($id)->delete();
        return redirect('/display-carts');
    }

    public function checkout(){
        $userId = Auth::user()->id;
        $user = Auth::user();
        $carts = Cart::where('username',$userId)->get();
        return view('home.checkout',compact('carts','user'));
    }
}
