<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'blog_posts';

    protected $fillable = [
        'title',
        'picture',
        'content',

    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_post', 'blog_post_id', 'category_id');
    }


}
