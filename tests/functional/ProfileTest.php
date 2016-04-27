<?php

class ProfileTest extends TestCase
{
    use FunctionalHelper;

    /** @test */
    public function view_my_profile()
    {
        $this->signIn()
            ->postAStatus('My new status.')
            ->click('Your Profile')
            ->seePageIs('/@JohnDoe')
            ->see('My new status.');
    }
}
