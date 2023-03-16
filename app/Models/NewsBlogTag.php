<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsBlogTag extends Model
{
    use HasFactory;
    protected $fillable =['tag_id','news_blog_id'];
    public $timestamps = false;
}
