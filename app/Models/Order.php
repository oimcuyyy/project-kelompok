<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['total_price', 'status', 'customer_name', 'order_type', 'table_number', 'payment_method', 'cash_received', 'change', 'transfer_proof'];

    public function items() {
        return $this->hasMany(OrderItem::class);
    }
}