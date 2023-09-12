<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable =[
        'product_title',
        'product_quantity',
        'selling_price',
        'product_image',
        'username'
    ];
}
