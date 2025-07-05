<?php

namespace App\Policies\V1;

use App\Models\User;
use App\Models\Ticket;
use App\Permissions\V1\Abilities;

class TicketPolicy
{
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can update the ticket.
     *
     * @param User $user
     * @param Ticket $ticket
     * @return bool
     */
    public function update(User $user, Ticket $ticket)
    {
        if ($user->tokenCan(Abilities::UPDATE_TICKET)) {
            return true;
        } elseif ($user->tokenCan(Abilities::UPDATE_OWN_TICKET)) {
            return $user->id === $ticket->user_id;
        }

        return false;
    }

    public function delete(User $user, Ticket $ticket)
    {
        if ($user->tokenCan(Abilities::DELETE_TICKET)) {
            return true;
        } elseif ($user->tokenCan(Abilities::DELETE_OWN_TICKET)) {
            return $user->id === $ticket->user_id;
        }

        return false;
    }

    public function replace(User $user)
    {
        return $user->tokenCan(Abilities::REPLACE_TICKET);
    }

    public function store(User $user, $ticket = null)
    {
        return $user->tokenCan(Abilities::CREATE_TICKET) ||
            $user->tokenCan(Abilities::CREATE_OWN_TICKET);
    }
}
