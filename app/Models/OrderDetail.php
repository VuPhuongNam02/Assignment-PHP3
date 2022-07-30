<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = "order_details";

    protected $fillable = [
        'orderId',
        'productId',
        'quantity',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'productId', 'id');
    }
    public function orders()
    {
        return $this->belongsTo(Order::class, 'orderId', 'id');
    }
}
