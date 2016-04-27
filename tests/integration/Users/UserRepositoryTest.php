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
}
