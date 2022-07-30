<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "product";

    protected $fillable = [
        'name',
        'slug',
        'view',
        'price',
        'image',
        'description',
        'sale',
        'brand',
        'size',
        'gender',
        'catId',
        'status',
        'album'
    ];
}