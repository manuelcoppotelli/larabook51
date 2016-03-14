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

    public function testItPaginateAllUsers()
    {
    	$users = factory('Larabook\Users\User', 4)->create();

    	$results = $this->repo->getPaginated(2);

    	$this->assertCount(2, $results);
    }
}
