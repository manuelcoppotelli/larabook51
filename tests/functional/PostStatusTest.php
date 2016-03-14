<?php

class PostStatusTest extends TestCase
{
    use FunctionalHelper;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testPostStatusesToMyProfile()
    {
        $this->signIn()
             ->visit('/statuses')
             ->postAStatus('My first post')
             ->seePageIs('/statuses')
             ->see('My first post');
    }
}
