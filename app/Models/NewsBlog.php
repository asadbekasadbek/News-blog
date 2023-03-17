<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsBlog extends Model
{
    use HasFactory;

    protected $fillable =['category_id', 'title','image','description'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'news_blog_tags');
    }
}
