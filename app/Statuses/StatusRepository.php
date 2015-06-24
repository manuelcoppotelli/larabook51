<?php

namespace Larabook\Statuses;

use Larabook\Users\User;
use Larabook\Statuses\Status;

class StatusRepository
{
    public function getAllForUser(User $user)
    {
        return $user->statuses;
    }

    /**
     * Persist a new status for a user  .
     *
     * @param Status $status
     * @param $userId
     * @return bool
     */
    public function save(Status $status, $userId)
    {
         return User::findOrFail($userId)
             ->statuses()
             ->save($status);
    }
}
