<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsBlogRequest;
use App\Models\Category;
use App\Models\NewsBlog;
use App\Models\NewsBlogTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class NewsBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('moderator');
        $new_blogs = NewsBlog::all();
        return view('News-blog.index', [
            'new_blogs' => $new_blogs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  Gate::authorize('admin');
        $categories = Category::all(['id', 'name']);
        $tags = Tag::all(['id', 'name']);
        return view('News-blog.create', [
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsBlogRequest $request): \Illuminate\Http\RedirectResponse
    {
        Gate::authorize('admin');
        $new = NewsBlog::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'image' => $request->file('image')->store('image', 'public'),
            'description' => $request->description,
        ]);

        foreach ($request->tags as $value) {
            NewsBlogTag::create([
                'tag_id' => $value,
                'news_blog_id' => $new->id,
            ]);
        }

        return redirect()->route('news-blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        Gate::authorize('moderator');
       $new = NewsBlog::with('comments')->where('id',$id)->first();
//       return  $new;
       return view('News-blog.show',[
           'new'=>$new,
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        Gate::authorize('moderator');
        $new = NewsBlog::findOr($id, fn() => abort(404));
        $categories = Category::all(['id', 'name']);
        $tags = Tag::all(['id', 'name']);
        return view('news-blog.edit', [
            'new' => $new,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsBlogRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        Gate::authorize('moderator');
        $new = NewsBlog::findOr($id, fn() => abort(404));
        $new->category_id = $request->category_id;
        $new->title = $request->title;
        Storage::disk('public')->delete($new->image);
        $new->image = $request->file('image')->store('image', 'public');
        $new->description = $request->description;
        $new->save();
        $tags = NewsBlogTag::all()->where('news_blog_id', $id);

        foreach ($tags as $value) {
            NewsBlogTag::destroy($value->id);
        }

        foreach ($request->tags as $value) {
            NewsBlogTag::create([
                'tag_id' => $value,
                'news_blog_id' => $new->id,
            ]);
        }
        return redirect()->route('news-blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\RedirectResponse
    {
        Gate::authorize('admin');
        $path = NewsBlog::findOr($id, fn() => abort(404));
        $path = $path->image;
        Storage::disk('public')->delete($path);
        $tags = NewsBlogTag::all()->where('news_blog_id', $id);
        foreach ($tags as $value) {
            NewsBlogTag::destroy($value->id);
        }
        NewsBlog::destroy($id);
        return redirect()->route('news-blog.index');
    }
}
