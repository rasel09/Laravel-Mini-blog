<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'user_id', 'title',
        'description', 'created_at', 'image'
    ];
    // relation ship 
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}