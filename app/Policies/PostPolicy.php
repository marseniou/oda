<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if (!$user->isEditor()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        switch ($user->role) {
            case 'admin': {
                return true;
            }
            case 'author': {
                if ($post->user_id == $user->id) {
                    return true;
                } else {
                    return false;
                }
            }
            case 'editor': {
                return true;
            }
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        switch ($user->role) {
            case 'admin': {
                return true;
            }
            case 'author': {
                if ($post->user_id == $user->id) {
                    return true;
                } else {
                    return false;
                }
            }
            case 'editor': {
                return false;
            }
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        //
    }
}
