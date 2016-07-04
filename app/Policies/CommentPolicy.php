<?php

namespace App\Policies;


use App\Comment;
use Illuminate\Foundation\Auth\User;

class CommentPolicy
{

    public function delete(User $user, Comment $comment)
    {
        if ($comment->user->id === $user->id)
            return true;

        return false;
    }
}
