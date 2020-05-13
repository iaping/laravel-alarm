<?php

namespace Aping\LaravelAlarm\Jobs;

use Exception;
use Aping\LaravelAlarm\Alarms\Alarm;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class AlarmJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    /**
     * max tries
     *
     * @var int
     */
    public $tries = 3;

    /**
     * timeout
     *
     * @var int
     */
    public $timeout = 180;

    /**
     * @var Alarm
     */
    public $alarm;

    /**
     * AlarmJob constructor.
     *
     * @param Alarm $alarm
     */
    public function __construct(Alarm $alarm)
    {
        $this->alarm = $alarm;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $this->alarm->send();
        } catch (Exception $e) {
            //TODO
        }
    }
    
}
