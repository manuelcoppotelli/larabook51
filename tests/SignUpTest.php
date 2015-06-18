<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SignUpTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testSignUpForALarabookAccount()
    {
        $this->asGuest();

        $this->visit('/')
             ->click('Sign Up!')
             ->seePageIs('/register');

        $this->submitForm([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'demo',
            'password_confirmation' => 'demo'
        ]);

        $this->seePageIs('/')
             ->see('Welcome to Larabook');

        $this->seeInDatabase('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com'
        ]);
    }


    /**
     * Check if the user is not authenticated.
     * @return $this
     */
    private function asGuest()
    {
        $this->assertFalse(Auth::check());
        return $this;
    }
}
