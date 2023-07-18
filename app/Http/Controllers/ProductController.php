<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(){
        return view('admin.product');
    }
    public function index(){
        return view('admin.addProduct');
    }

    public function addProduct(Request $request){
        echo '<pre>';
        print_r($request->toArray());
    }
}
