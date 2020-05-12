<?php

return [

    /**
     * 报警环境
     */
    'env' => env('ALARM_ENV', 'production'),

    /**
     * 队列
     */
    'queue' => env('ALARM_QUEUE', 'laravel-alarm'),

    /**
     * 报警事件
     */
    'events' => [
        //log
        Illuminate\Log\Events\MessageLogged::class => [
            Aping\LaravelAlarm\Alarms\Handlers\DingTalk\MessageLoggedAlarm::class,
        ],
        //queue
        Illuminate\Queue\Events\JobFailed::class => [
            Aping\LaravelAlarm\Alarms\Handlers\JobFailedDingTalkAlarm::class,
        ],
    ],

    /**
     * 钉钉配置
     * DingTalk setting
     */
    'dingtalk' => [
        'webhook' => env('ALARM_DING_HOOK', ''),
    ],

];
