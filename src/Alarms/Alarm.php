<?php

namespace Aping\LaravelAlarm\Alarms;

interface Alarm
{
    /**
     * send message
     *
     * @return string
     */
    public function send();
    
}
