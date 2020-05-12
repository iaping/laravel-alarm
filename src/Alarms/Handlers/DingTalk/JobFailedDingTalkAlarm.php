<?php

namespace Aping\LaravelAlarm\Alarms\Handlers;

use Aping\LaravelAlarm\Alarms\DingTalkAlarm;
use Illuminate\Queue\Events\JobFailed;

class JobFailedDingTalkAlarm extends DingTalkAlarm
{
    use JobFailedTrait;

    protected function build()
    {
        return sprintf("**系统队列报警**\n\n---\n\n队列: %s\n\n任务: %s\n\n发生时间: %s\n\n错误信息:\n\n> %s",
            $this->event->connectionName,
            $this->job,
            $this->eventTime,
            $this->message);
    }

}
