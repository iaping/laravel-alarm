<?php

namespace Aping\LaravelAlarm\Alarms;

use Aping\PddingRobot\Fast;

abstract class DingTalkAlarm implements Alarm
{
    /**
     * @return string|void
     * @throws \Aping\PddingRobot\Exceptions\HttpException
     * @throws \Aping\PddingRobot\Exceptions\UnknownResponseException
     */
    public function send()
    {
        $robot = Fast::new(config('alarm.dingtalk.token'), config('alarm.dingtalk.key'));

        $robot->sendMarkdown($this->title(), $this->build());
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
