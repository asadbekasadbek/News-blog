<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategotyRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();
        return view('Category.index',[
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategotyRequest $request): \Illuminate\Http\RedirectResponse
    {
        Category::create([
            'name'=> $request->name,
        ]);
        return \redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $category = Category::findOr($id, fn () => abort(403));

        return view('Category.edit',[
            'category'=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategotyRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $category = Category::findOr($id, fn () => abort(404));
        $category->name =$request->name;
        $category->save();
        return \redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\RedirectResponse
    {
        Category::destroy($id);
        return \redirect()->route('category.index');
    }
}
