<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\ProductImages;

class productImageController extends Controller
{
    public function store(Request $request){
    if (!empty($request->image)) {
        $image = $request->image;
        $ext = $image->getClientOriginalExtension();

        $productImage = new ProductImages();
        $productImage->name = 'NULL';
        $productImage->product_id = $request->product_id;
        $productImage->save();

        $newImageName = $productImage->id.'.'.$ext;

        $productImage->name = $newImageName;
        $productImage->save();

        $sourcePath = $image->getPathName();
        $destPath = public_path('/uploads/products/').$newImageName;
        $img = Image::make($sourcePath);
        $img->resize(350, 400, function ($constraint) {
                     $constraint->aspectRatio();
            });
        $img->save($destPath);

        return response()->json([
        'status' => true,
        'image_id' => $productImage->id,
        'name' => $newImageName,
        'imagePath' => asset('uploads/products/'.$newImageName)
    ]);
    }
}


public function deleteImage($image_id, Request $request){
    $image = ProductImages::find($image_id);
    if($image){
        File::delete(public_path('uploads/products/'.$image->name));
        $image->delete();
        return response()->json(
            [
                'status'=>'delete'
            ]
            );
    }
   
}
}
