<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'images_id',
        'name',
        'description',
        'categories_id',
        'price',
        'market_price',
    ];
}
