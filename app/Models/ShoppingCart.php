<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShoppingCart extends Model
{
    use HasFactory,SoftDeletes;

    protected $table ='shopping_carts';

    protected $fillable = [
        'user_id'
    ];

    public function items()
    {
        return $this->hasMany(CartItem::class, 'shopping_cart_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
