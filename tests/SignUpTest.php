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
            'password' => 'secret',
            'password_confirmation' => 'secret'
        ]);

        $this->seePageIs('/')
             ->see('Welcome to Larabook');

        $this->seeInDatabase('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com'
        ]);

        $this->assertTrue(Auth::check());
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
