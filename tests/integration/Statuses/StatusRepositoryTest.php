<?php

use Larabook\Statuses\Status;
use Larabook\Statuses\StatusRepository;

class StatusRepositoryTest extends TestCase
{
    use IntegrationHelper;

    protected $repo;

    function __construct()
    {
        $this->repo = new StatusRepository();
    }

    /** @test */
    public function it_gets_all_statuses_for_a_user()
    {
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

    /** @test */
    public function it_saves_a_status_for_a_user()
    {
        $status = Status::create(['body' => 'Another status']);

        $user = factory('Larabook\Users\User')->create();

        $this->repo->save($status, $user->id);

        $this->seeInDatabase('statuses', [
            'body' => 'Another status',
            'user_id' => $user->id
        ]);
    }
}
