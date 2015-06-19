<?php

namespace Larabook\Events;

use Larabook\Users\User;
use Illuminate\Queue\SerializesModels;

class UserRegistred extends Event
{
    use SerializesModels;

    private $user;

    /**
     * Create a new event instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        //
        $this->user = $user;
    }
}
