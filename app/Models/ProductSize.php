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

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId', 'id');
    }


    public function size()
    {
        return $this->belongsTo(Size::class, 'sizeId', 'id');
    }
}
