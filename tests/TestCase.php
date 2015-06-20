<?php

use Larabook\Users\User;

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

    /**
     * Check if the user is not authenticated.
     *
     * @param null $data
     * @return $this
     */
    private function haveAnAccount($data = null)
    {
        if ($data == null)
            $data = $this->user;
        $this->assertNotNull(User::create($data));

        return $this;
    }

    /**
     * Sign In.
     *
     * @param null $data
     * @return $this
     */
    public function signIn($data = null)
    {
        if ($data == null)
            $data = $this->user;

        $this->haveAnAccount($data);

        $this->visit('/login')
            ->see('Login');

        $this->type($data['email'], 'email')
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
}
