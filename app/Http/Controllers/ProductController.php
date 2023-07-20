<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(){
        return view('admin.product');
    }
    public function index(){
        $categories = Category::all();
        return view('admin.addProduct',compact('categories'));
    }

    public function addProduct(Request $request){
        echo '<pre>';
        print_r($request->toArray());
    }
}
