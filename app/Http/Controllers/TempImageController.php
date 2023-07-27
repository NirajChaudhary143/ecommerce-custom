<?php

namespace App\Http\Controllers;

use App\Models\TempImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class TempImageController extends Controller
{
    public function store(Request $request){
        if(!empty($request->image)){
            $image= $request->image;

            $ext =$image->getClientOriginalExtension();

            $tempImg = new TempImage();
            $tempImg->name = 'null';
            $tempImg->save();

            $imgName = $tempImg->id.'.'.$ext;
            $tempImg->name = $imgName;
            $tempImg->save();

            $image->move(public_path('uploads/temp/'),$imgName);

            // Create Thumbnail

            $sourcePath = public_path('uploads/temp/'.$imgName);
            $destPath = public_path('uploads/temp/thumb/'.$imgName);
            $img = Image::make($sourcePath);
            $img->fit(350,300);
            $img->save($destPath);
            return response()->json([
                'status'=>true,
                'image_id'=>$tempImg->id,
                'name'=> $imgName
            ]);
        }
    }
}
