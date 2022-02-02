<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'customer_name', 'contact', 'email', 'address', 'amount', 'status', 'payment_type'];
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
