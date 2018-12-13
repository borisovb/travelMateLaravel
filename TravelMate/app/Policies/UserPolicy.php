<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function approve(User $user)
    {
        return $user->isEditor;
    }

    public function manageUsers(User $user)
    {
        return $user->isAdmin;
    }

    public function before($user, $ability)
    {
        if ($user->isAdmin == true) {
            return true;
        }
    }
}
