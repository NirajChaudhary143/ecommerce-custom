<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\User;
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

    public function addOrder(Request $request){
        if($request->isMethod('post')){

            $request->validate([
                'name'=>'required',
                'email'=>'required|email',
                'phone_number'=>'required|digits:10',
                'address'=>'required'
            ]);
            $userId = Auth::user()->id;
            $user = User::find($userId);
            $user->name = $request['name'];
            $user->phone_number=$request['phone_number'];
            $user->address=$request['address'];
            $user->email=$request['email'];
            $user->save();
          
            // get cart details
            $carts = Cart::where('username',$userId)->get();
            // save order details on order table
            // After processing the order and deleting the cart items
            if ($carts->count() > 0) {
                foreach ($carts as $cart) {
                    $order = new Order();
                    $order->user_id = $userId;
                    $order->quantity = $cart->product_quantity;
                    $order->product_title = $cart->product_title;
                    $order->total_price = $cart->total_price;
                    $order->payment_status = 'unpaid';
                    $order->payment_method = 'COD';
                    $order->status = 'pending';
                    $res = $order->save();
                    $cart->delete();
                }
    
                // Store a success message in the session
                session()->flash('success', 'Order Placed Successfully');
            } 
            else {
                session()->flash('error', 'Please Add Products To Cart');
            }
    
            return view('home.success');
        }
    }
}
