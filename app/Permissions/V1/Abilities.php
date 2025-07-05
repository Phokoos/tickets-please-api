<?php

namespace App\Permissions\V1;

use App\Models\User;

final class Abilities
{
    public const CREATE_TICKET = 'ticket:create';
    public const REPLACE_TICKET = 'ticket:replace';
    public const UPDATE_TICKET = 'ticket:update';
    public const DELETE_TICKET = 'ticket:delete';

    public const DELETE_OWN_TICKET = 'ticket:own:delete';
    public const UPDATE_OWN_TICKET = 'ticket:own:update';

    public const CREATE_USER = 'user:create';
    public const REPLACE_USER = 'user:replace';
    public const UPDATE_USER = 'user:update';
    public const DELETE_USER = 'user:delete';


    public static function getAbilities(User $user)
    {
        if ($user->is_manager) {
            return [
                self::CREATE_TICKET,
                self::REPLACE_TICKET,
                self::UPDATE_TICKET,
                self::DELETE_TICKET,

                self::CREATE_USER,
                self::REPLACE_USER,
                self::UPDATE_USER,
                self::DELETE_USER
            ];
        } else {
            return [
                self::CREATE_TICKET,
                self::UPDATE_OWN_TICKET,
                self::DELETE_OWN_TICKET,
            ];
        }
    }
}
