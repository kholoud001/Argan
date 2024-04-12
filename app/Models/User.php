<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'google_id',
        'facebook_id',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $dates = ['deleted_at'];


    public function wishlistItems()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function shoppingCart()
    {
        return $this->hasOne(ShoppingCart::class);
    }

    public function cartItems()
    {
        return $this->hasManyThrough(CartItem::class, ShoppingCart::class);
    }

    //    public function role()
//    {
//        return $this->belongsTo(Role::class);
//    }

//    public function hasRole($role)
//    {
//        return $this->role()->where('name', $role)->exists();
//    }
}
