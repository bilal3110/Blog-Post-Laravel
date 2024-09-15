<?php
// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Category extends Model
// {
//     use HasFactory;

//     protected $table = "category";
//     protected $primaryKey = "cid";

//     protected $fillable = ['name', 'posts'];

//     // Relationship with posts
//     public function posts()
//     {
//         return $this->hasMany(Posts::class, 'category_id', 'cid');
//     }
    
    
// }


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "category";
    protected $primaryKey = "cid";

    protected $fillable = ['name', 'posts_count'];

    public function posts()
    {
        return $this->hasMany(Posts::class, 'category_id', 'cid');
    }
}
