<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Larabook\Users\User;

class SignInTest extends TestCase
{
    use DatabaseTransactions;

    private $user;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testLogInToMyLarabookAccount()
    {
        $this->signIn();

        $this->seePageIs('/statuses')
             ->see('Welcome back!');
    }


    /**
     * Check if the user is not authenticated.
     *
     * @return $this
     */
    private function haveAnAccount()
    {
        $this->user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'secret'
        ]);
        $this->assertNotNull($this->user);
        return $this;
    }


    /**
     * Sign In.
     *
     * @return $this
     */
    public function signIn()
    {
        $this->haveAnAccount();

        $this->visit('/login')
            ->see('Login');

        $this->type('johndoe@example.com', 'email')
            ->type('secret', 'password')
            ->press('Login');
    }

}
