<?php

namespace Larabook\Jobs;

use Larabook\Users\User;
use Larabook\Events\UserRegistred;
use Larabook\Users\UserRepository;
use Illuminate\Contracts\Bus\SelfHandling;

class RegisterUserJob extends Job implements SelfHandling
{
    private $username;
    private $email;
    private $password;

    /**
     * Create a new job instance.
     *
     * @param $username
     * @param $email
     * @param $password
     */
    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @param UserRepository $repository
     * @return User
     */
    public function handle(UserRepository $repository)
    {
        $user = User::register($this->username, $this->email, $this->password);

        $repository->save($user);

        event(new UserRegistred($user));

        return $user;
    }
}
