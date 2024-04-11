<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'cart_items';

    protected $fillable = [
        'shopping_cart_id',
        'product_id',
        'quantity'
    ];

    public function cart()
    {
        return $this->belongsTo(ShoppingCart::class, 'shopping_cart_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
