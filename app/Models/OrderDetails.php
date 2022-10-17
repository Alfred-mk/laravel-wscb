<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'orderDetails';

    use HasFactory;

    protected $fillable = [
        'orderId',
        'productId',
        'quantity'
    ];
}
