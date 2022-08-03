<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";

    protected $fillable = [
        'code',
        'name',
        'slug',
        'price',
        'sale',
        'image',
        'description',
        'brand',
        'status',
        'categoryId',
    ];

    protected $casts = [
        'size' => 'array',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId', 'id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'productId', 'id');
    }
}
