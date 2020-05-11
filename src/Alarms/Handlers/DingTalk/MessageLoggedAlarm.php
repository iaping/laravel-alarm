<?php

namespace Aping\LaravelAlarm\Alarms\Handlers\DingTalk;

use Aping\LaravelAlarm\Alarms\DingTalkAlarm;
use Aping\LaravelAlarm\Alarms\Handlers\MessageLoggedTrait;

class MessageLoggedAlarm extends DingTalkAlarm
{
    use MessageLoggedTrait;

    protected function build()
    {
        return sprintf("**系统日志报警**\n\n---\n\n日志级别: %s\n\n发生时间: %s\n\n错误信息:\n\n> %s",
            $this->level,
            $this->eventTime,
            $this->message);
    }

}
