<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductImages;
use App\Models\TempImage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function show(){
        $activeProducts=Product::where('status','active')->get();
        $draftProducts=Product::where('status','draft')->get();
        $productImages = ProductImages::all();
        return view('admin.product',compact('activeProducts','productImages','draftProducts'));
    }
    public function index(){
        $categories = Category::all();
        return view('admin.addProduct',compact('categories'));
    }


    public function addProduct(Request $request){
        // print_r($request->post());

        $request->validate([
            'product_title' => 'required|not_regex:/^[0-9]+$/',
            'product_description'=>'required|not_regex:/^[0-9]+$/',
            'selling_price'=>'required|numeric|gt:1',    
        ]);

        $product = new Product();
        $product->product_title=$request['product_title'];
        $product->product_description=$request['product_description'];
        $product->selling_price=$request['selling_price'];
        $product->crossed_price=$request['crossed_price'];
        $product->category_id=$request['category_id'];
        $product->cost_per_item=$request['cost_per_item'];
        $product->product_quantity=$request['product_quantity'];
        $product->status=$request['status'];
        // $product->product_image="Null";
        $result= $product->save();

        if(!empty($request->image_id)){
            foreach($request->image_id as $key => $imageId){
                $tempImage=TempImage::find($imageId);
                $extArray = explode('.',$tempImage->name);
                $ext =last($extArray);

                $productImage = new ProductImages();
                $productImage->name='NULL';
                $productImage->product_id=$product->id;
                $productImage->save();

                $newImageName = $productImage->id.'.'.$ext;
                $productImage->name=$newImageName;
                $productImage->save();
                
                // $tempImage->name->move(public_path('uploads/temp/'),$$newImageName);

                $sourcePath = public_path('uploads/temp/').$tempImage->name;
                $destPath = public_path('/uploads/products/').$newImageName;
                $img = Image::make($sourcePath);
                $img->resize(350, 400, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($destPath);
                
            }
        }        
        
        if($result){
            return redirect('/admin/product');
        }
    }

    public function editView($id){
        $product= Product::find($id);
        $categories = Category::all();
        $productImage = ProductImages::where('product_id',$id)->get();
        return view('admin.editProduct',compact('product','categories','productImage'));
    }

    public function updateProduct(Request $request,$id){

    }
}
