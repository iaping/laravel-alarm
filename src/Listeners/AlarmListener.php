<?php

namespace Aping\LaravelAlarm\Listeners;

use Aping\LaravelAlarm\Alarms\Handlers\LoggedDingTalkAlarm;
use Aping\LaravelAlarm\Jobs\AlarmJob;
use Illuminate\Log\Events\MessageLogged;
use Illuminate\Queue\Events\JobFailed;

class AlarmListener
{
    /**
     * Handle the event.
     *
     * @param $event
     * @return void
     */
    public function handle($event)
    {
        $alarms = config(sprintf('alarm.events.%s', get_class($event)));
        if (! is_array($alarms) || empty($alarms)) {
            return;
        }

        $queue = config('alarm.queue', 'laravel-alarm');
        foreach ($alarms as $alarm) {
            AlarmJob::dispatch(new $alarm($event))->onQueue($queue);
        }
    }

}
