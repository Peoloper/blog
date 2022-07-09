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
        if($user->can('pisanie postów'))
        {
            return true;
        }
    }

    public function update(User $user, Post $post)
    {
        if($user->can('edycja własnych postów'))
        {
            return $user->id == $post->user_id;
        }
        if ($user->can('edycja wszystkich postów'))
        {
            return true;
        }
    }

    public function delete(User $user)
    {
        if($user->can('usuwanie postów'))
        {
            return true;
        }
    }
}
