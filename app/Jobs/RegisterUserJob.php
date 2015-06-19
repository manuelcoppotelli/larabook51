<?php

namespace Larabook\Jobs;

use Larabook\Users\User;
use Larabook\Users\UserRepository;
use Illuminate\Contracts\Bus\SelfHandling;

class RegisterUserJob extends Job implements SelfHandling
{
    private $name;
    private $email;
    private $password;

    /**
     * Create a new job instance.
     *
     * @param $name
     * @param $email
     * @param $password
     */
    public function __construct($name, $email, $password)
    {
        $this->name = $name;
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
        $user = User::register($this->name, $this->email, $this->password);

        $repository->save($user);

        return $user;
    }
}
