<?php

namespace App\Policies;


use App\Post;
use App\User;

class PostPolicy
{
    public function comment(User $user, Post $post)
    {
        return true;
    }
}
