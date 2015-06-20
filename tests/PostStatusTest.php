<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostStatusTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testPostStatusesToMyProfile()
    {
        $this->signIn();

        $this->visit('/statuses');

        $this->postAStatus('My first post')
             ->see('My first post');
    }
}
