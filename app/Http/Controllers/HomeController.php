<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\NewsBlog;
use App\Models\Tag;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $news = NewsBlog::with('comments')->paginate(1);

        return view('Home.welcome',[
            'news'=>$news,
        ]);
    }

    public function tags($id){
        $tag = Tag::find($id);
        $tags = $tag->newsBlogTags;
      return  view('Home.tags',[
          'tags'=>$tags,
          'tag'=>$tag
      ] );

    }

    public function category(Request $request){
        $category = Category::find($request->category_id);
        $categories = $category->news;
        return view('Home.category',[
            'category'=>$category,
            'categories'=>$categories
        ]);
    }

    public function new($id){
        $new = NewsBlog::find($id);
        return view('Home.new',[
            'new'=>$new
        ]);
    }
}
