<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Политика Удаления
     *
     * @param User $user
     * @return bool
     */
    public function delete(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Политика восстановления
     *
     * @param User $user
     * @return bool
     */
    public function restore(User $user)
    {
        return $user->isAdmin();
    }
}
