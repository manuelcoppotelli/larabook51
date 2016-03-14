<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

trait FunctionalHelper
{
    use DatabaseTransactions;

    /**
     * The user necessary for register and Sign in tests.
     *
     * @var
     */
    protected $user = [
            'username' => 'JohnDoe',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
    ];

    /*
     * Create a status.
     */
    public function postAStatus($body)
    {
        $this->type($body, 'body')
            ->press('Post Status');
        return $this;
    }

    /**
     * Sign In.
     *
     * @param array $data
     * @return $this
     */
    public function signIn($data = [])
    {
        if ($data === [])
            $data = $this->user;

        $this->haveAnAccount($data);

        $this->visit('/login')
             ->type($data['email'], 'email')
             ->type($data['password'], 'password')
             ->press('Login');

        return $this;
    }

    /**
     * Check if the user is not authenticated.
     * @return $this
     */
    public function asGuest()
    {
        $this->assertFalse(Auth::check());
        return $this;
    }

    /**
     * Create an account
     *
     * @param array $override
     * @return $this
     */
    public function haveAnAccount($override = [])
    {
        $this->have('Larabook\Users\User', $override);
        return $this;
    }

    /**
     * Create a new instance of a model
     *
     * @param $model
     * @param array $overrides
     * @return mixed
     */
    public function have($model, $overrides = [])
    {
        factory($model)->create($overrides);
        return $this;
    }
}
