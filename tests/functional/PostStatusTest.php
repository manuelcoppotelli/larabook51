<?php

class PostStatusTest extends TestCase
{
    use FunctionalHelper;

    /** @test */
    public function post_statuses_to_my_profile()
    {
        $this->signIn()
             ->visit('/statuses')
             ->postAStatus('My first post')
             ->seePageIs('/statuses')
             ->see('My first post');
    }
}
