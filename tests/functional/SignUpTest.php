<?php

class SignUpTest extends TestCase
{
    use FunctionalHelper;

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
            'username' => 'JohnDoe',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret'
        ]);

        $this->seePageIs('/')
             ->see('Welcome to Larabook');

        $this->seeInDatabase('users', [
            'username' => 'JohnDoe',
            'email' => 'johndoe@example.com'
        ]);

        $this->assertTrue(Auth::check());
    }
}
