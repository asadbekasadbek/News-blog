<?php

namespace App\Http\Controllers;


use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Traits\Comments;


class CommentController extends Controller
{
    use Comments;
    public function store(CommentRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        Comment::create([
            'news_blog_id' => $id,
            'user_id' => auth()->id(),
            'description' => $request->description,
        ]);

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, $id)
    {
        $comment = Comment::findOr($id, fn() => abort(404));
        if (self::updateComments(auth()->user(),$comment)) {
            $comment->description = $request->description;
            $comment->save();
            return redirect()->back();
        }else{
            abort(403);
        }
    }

    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $comment = Comment::findOr($id, fn() => abort(404));
        if (self::destroyComments(auth()->user(),$comment)) {
            Comment::destroy($id);
            return redirect()->back();
        }
        else{
            abort(403);
        }
    }
}
