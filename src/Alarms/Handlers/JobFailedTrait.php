<?php

namespace Aping\LaravelAlarm\Alarms\Handlers;

use Carbon\Carbon;
use Illuminate\Queue\Events\JobFailed;

trait JobFailedTrait
{
    /**
     * @var string
     */
    public $connectionName;

    /**
     * @var string
     */
    public $job;

    /**
     * @var string
     */
    public $message;

    /**
     * @var Carbon
     */
    public $eventTime;

    /**
     * JobFailedTrait constructor.
     *
     * @param JobFailed $failed
     */
    public function __construct(JobFailed $failed)
    {
        $this->connectionName = $failed->connectionName;
        $this->message = $failed->exception->getMessage();
        $this->job = $failed->job->getName();
        $this->eventTime = Carbon::now();
    }

    /**
     * @return string
     */
    public function title()
    {
        return '系统队列报警';
    }

}
