<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // app/Models/Product.php

    protected $fillable = [
        'name',
        'category',
        'sub_category',
        'description',
        'price',
        'price_discount',
        'images',
        'images1',
        'images2',
        'images3',
        'images4',
        'images5',
    ];



}
