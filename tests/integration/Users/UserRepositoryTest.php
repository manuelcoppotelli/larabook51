<?php

use Larabook\Users\UserRepository;

class UserRepositoryTest extends TestCase
{
    use IntegrationHelper;

    protected $repo;

    function __construct()
    {
        $this->repo = new UserRepository();
    }

    /** @test */
    public function it_paginates_all_users()
    {
        $users = factory('Larabook\Users\User', 4)->create();

        $results = $this->repo->getPaginated(2);

        $this->assertCount(2, $results);
    }

    /** @test */
    public function it_finds_a_user_with_statuses_by_their_username()
    {
        $statuses = factory('Larabook\Statuses\Status', 3)->create();
        $username = $statuses[0]->user->username;
        $user = $this->repo->findByUsername($username);
        $this->assertEquals($username, $user->username);
        $this->assertCount(3, $user->statuses);
    }
}
