<?php

use Larabook\Statuses\StatusRepository;

class StatusRepositoryTest extends TestCase
{
    use IntegrationHelper;

    protected $repo;

    public function testGetsAllStatusesForAUser()
    {
        $this->repo = new StatusRepository();

        $users = factory('Larabook\Users\User', 2)->create();

        factory('Larabook\Statuses\Status', 2)->create([
            'user_id' => $users[0]->id,
            'body' => 'My status',
        ]);

        factory('Larabook\Statuses\Status', 2)->create([
            'user_id' => $users[1]->id,
            'body' => 'His status',
        ]);

        $statusForUser = $this->repo->getAllForUser($users[0]);

        $this->assertCount(2, $statusForUser);
        $this->assertEquals('My status', $statusForUser[0]->body);
        $this->assertEquals('My status', $statusForUser[1]->body);
    }
}
