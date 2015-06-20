<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';


    /**
     * The user necessary for register and Sign in tests;
     *
     * @var
     */
    protected $user = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
    ];

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

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
