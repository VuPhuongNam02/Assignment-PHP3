<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function product_size()
    {
        return $this->hasMany(ProductSize::class, 'sizeId', 'id');
    }
}
