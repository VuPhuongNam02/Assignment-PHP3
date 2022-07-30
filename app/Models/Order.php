<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'total',
        'payment',
        'userId',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'orderId', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
