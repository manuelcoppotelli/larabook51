<?php

class SignInTest extends TestCase
{
    use FunctionalHelper;

    /** @test */
    public function login_to_my_larabook_account()
    {
        $this->signIn();

        $this->seePageIs('/statuses')
             ->see('Welcome back!')
             ->assertTrue(Auth::check());
    }
}
