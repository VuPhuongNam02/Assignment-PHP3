<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    protected $fillable = [
        'productId',
        'sizeId'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'productId', 'id');
    }


    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'sizeId', 'id');
    }
}
