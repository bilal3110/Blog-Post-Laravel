<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = "posts";
    protected $primaryKey = "pid";

    public static function boot()
{
    parent::boot();

    static::created(function ($post) {
        $post->category->increment('posts');
    });

    static::deleted(function ($post) {
        $post->category->decrement('posts');
    });

    static::updated(function ($post) {
        if ($post->isDirty('category_id')) {
            Category::find($post->getOriginal('category_id'))->decrement('posts');
            
            Category::find($post->category_id)->increment('posts');
        }
    });
}


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'cid');
    }
}
