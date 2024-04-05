<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;

    protected $table='categories';

    protected $fillable = [
    'name',

        ];
    public function posts()
    {
        return $this->belongsToMany(Blog::class, 'category_post', 'category_id', 'blog_post_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
