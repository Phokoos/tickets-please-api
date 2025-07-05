<?php

namespace App\Policies\V1;

use App\Models\User;
use App\Models\Ticket;
use App\Permissions\V1\Abilities;

class  UserPolicy
{
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can update the ticket.
     *
     * @param User $user
     * @return bool
     */
    public function update(User $user)
    {
        return $user->tokenCan(Abilities::UPDATE_USER);
    }

    public function delete(User $user)
    {
        return $user->tokenCan(Abilities::DELETE_USER);
    }

    public function replace(User $user)
    {
        return $user->tokenCan(Abilities::REPLACE_USER);
    }

    public function store(User $user)
    {
        return $user->tokenCan(Abilities::CREATE_USER);
    }
}
