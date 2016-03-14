<?php

class SignInTest extends TestCase
{
    use FunctionalHelper;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testLogInToMyLarabookAccount()
    {
        $this->signIn();

        $this->seePageIs('/statuses')
             ->see('Welcome back!')
             ->assertTrue(Auth::check());
    }
}
