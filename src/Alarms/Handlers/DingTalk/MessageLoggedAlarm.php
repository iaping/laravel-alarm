<?php

namespace Aping\LaravelAlarm\Alarms\Handlers\DingTalk;

use Aping\LaravelAlarm\Alarms\DingTalkAlarm;
use Aping\LaravelAlarm\Alarms\Handlers\MessageLoggedTrait;

class MessageLoggedAlarm extends DingTalkAlarm
{
    use MessageLoggedTrait;

    protected function build()
    {
        return sprintf("**%s**\n\n---\n\n%s: %s\n\n%s: %s\n\n%s:\n\n> %s",
            trans('alarm::alarm.message_logged_dingtalk_title'),
            trans('alarm::alarm.message_logged_level'),
            $this->level,
            trans('alarm::alarm.exception_time'),
            $this->eventTime,
            trans('alarm::alarm.exception_message'),
            $this->message);
    }

}
