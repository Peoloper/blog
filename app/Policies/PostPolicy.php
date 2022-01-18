<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        if($user->can('write post'))
        {
            return true;
        }
    }

    public function update(User $user, Post $post)
    {
        if($user->can('edit own posts'))
        {
            return $user->id == $post->user_id;
        }
        if ($user->can('edit all posts'))
        {
            return true;
        }
    }

    public function delete(User $user)
    {
        if($user->can('delete posts'))
        {
            return true;
        }
    }
}
