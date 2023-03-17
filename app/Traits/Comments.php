<?php

namespace App\Traits;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

trait Comments
{

    public static function updateComments(User $user, Comment $comment)
    {
        if ($user->id == $comment->user_id | auth()->user()->hasRole('admin')) {
            return true;
        }
        else {
            return false;
        }
    }

    public static function destroyComments(User $user, Comment $comment)
    {
        if ($user->id == $comment->user_id | auth()->user()->hasRole(['admin', 'moderator'])) {
            return true;
        }
        else{
            return false;
        }
    }

}
