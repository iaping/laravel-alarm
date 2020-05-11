<?php

namespace Aping\LaravelAlarm\Alarms;

use bingher\ding\DingBot;

abstract class DingTalkAlarm implements Alarm
{
    public function send()
    {
        $ding = new DingBot(config('alarm.dingtalk'));

        $ding->markdown($this->title(), $this->build());
    }

    /**
     * title
     *
     * @return string
     */
    abstract protected function title();

    /**
     * build message
     *
     * @return string
     */
    abstract protected function build();

}
