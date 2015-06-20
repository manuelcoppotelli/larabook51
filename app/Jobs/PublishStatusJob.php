<?php

namespace Larabook\Jobs;

use Larabook\Jobs\Job;
use Larabook\Statuses\Status;
use Larabook\Events\StatusWasPublished;
use Larabook\Statuses\StatusRepository;
use Illuminate\Contracts\Bus\SelfHandling;

class PublishStatusJob extends Job implements SelfHandling
{

    private $body;

    private $userId;

    /**
     * Create a new job instance.
     *
     * @param $body
     */
    public function __construct($body, $userId)
    {
        $this->body = $body;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @param StatusRepository $repository
     * @return Status
     */
    public function handle(StatusRepository $repository)
    {
        $status = Status::publish($this->body);

        $repository->save($status, $this->userId);

        event(new StatusWasPublished($status));

        return $status;
    }
}
