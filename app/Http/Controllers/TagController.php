<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $tags = Tag::all();

        return view('Tag.index',[
            'tags'=>$tags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('Tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request): \Illuminate\Http\RedirectResponse
    {
        Tag::create([
            'name'=>$request->name,
        ]);

        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $tag = Tag::findOr($id, fn () => abort(404));
        return view('Tag.edit',[
            'tag'=>$tag,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $tag = Tag::findOr($id, fn () => abort(404));
        $tag->name = $request->name;
        $tag->save();
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\RedirectResponse
    {
        Tag::destroy($id);
        return redirect()->route('tag.index');
    }
}
