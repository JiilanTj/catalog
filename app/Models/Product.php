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
        'description',
        'price',
        'price_discount',
        'images',
    ];



}