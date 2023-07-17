<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'product_name',
        'product_description',
        'product_quantity',
        'crossed_price',
        'cost_per-item',
        'category_id',
        'selling_price'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'id','category_id');
    }
}
