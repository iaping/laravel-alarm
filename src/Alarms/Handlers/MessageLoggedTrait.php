<?php

namespace Aping\LaravelAlarm\Alarms\Handlers;

use Carbon\Carbon;
use Illuminate\Log\Events\MessageLogged;

trait MessageLoggedTrait
{
    /**
     * @var string
     */
    public $level;

    /**
     * @var string
     */
    public $message;

    /**
     * @var Carbon
     */
    public $eventTime;

    /**
     * LoggedDingTalkAlarm constructor.
     *
     * @param MessageLogged $logged
     */
    public function __construct(MessageLogged $logged)
    {
        $this->level = $logged->level;
        $this->message = $logged->message;
        $this->eventTime = Carbon::now();
    }

    /**
     * @return string
     */
    public function title()
    {
        return '系统日志报警';
    }

}
