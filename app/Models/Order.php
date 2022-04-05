<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'code',
        'customer_name',
        'phone',
        'payment_method',
        'observations',
        'adress',
        'adress_complement',
        'status',
        'total_price',
        'cart',

    ];


    public function scopeNotDone($query)
    {
        return $query->whereNot('status', 'delivered');
    }
}
