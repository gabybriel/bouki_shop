<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can access the admin dashboard.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function accessAdmin(User $user)
    {
        return $user->is_admin === true;
    }
}
