<?php

namespace App\Policies;

use App\User;
use App\Story;
use Illuminate\Auth\Access\HandlesAuthorization;

class StoryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function manage(User $user, Story $story)
    {
        return $story->user_id == $user->id || $user->isEditor;
    }

    public function before($user, $ability)
    {
        if ($user->isAdmin == true) {
            return true;
        }
    }
}
