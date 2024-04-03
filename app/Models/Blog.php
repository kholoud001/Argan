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
        'category_id',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
