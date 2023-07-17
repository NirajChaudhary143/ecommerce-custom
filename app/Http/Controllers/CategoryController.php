<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Image;

class CategoryController extends Controller
{
    public function store(Request $request){
        echo "<pre>";
        print_r($request->toArray());
        $category = new Category();
        $request->validate([
            'image'=>'required',
            'category'=>'required|unique:categories,name'
        ]);
        $category->name= $request->category;
        $category->image= 'NULL';
        $category->save();

        $image= $request->file('image');
        $ext = $image->getClientOriginalExtension();

        $fileName = $category->id.'_snpasal_category_.'.$ext;
        // $category->image= $fileName;
        $distPath = $request->file('image')->storeAs('category_image',$fileName,'public');
        $category->image= '/storage/'.$distPath;
        $category->save();
        
        return redirect('/admin/category');
        
    }

    public function delete($id){
        Category::find($id)->delete();
        return redirect('/admin/category');
    }
}
