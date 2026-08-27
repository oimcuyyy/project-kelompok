<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'recipe_id', 'quantity', 'price'];

    public function menu() {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }
}