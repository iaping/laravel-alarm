<?php

return [

    /**
     * 报警环境
     * alarm env
     */
    'env' => env('ALARM_ENV', 'production'),

    /**
     * 队列
     * alarm queue
     */
    'queue' => env('ALARM_QUEUE', 'laravel-alarm'),

    /**
     * 钉钉配置
     * DingTalk setting
     */
    'dingtalk' => [
        'webhook' => env('ALARM_DING_HOOK', ''),
    ],

    /**
     * 报警事件
     * events & alarms
     *
     * [
     *      Events::class => [
     *          Alarm1::class,
     *          Alarm2::class,
     *          Alarm3::class,
     *      ]
     * ]
     */
    'events' => [
        //log alarm
        Illuminate\Log\Events\MessageLogged::class => [
            Aping\LaravelAlarm\Alarms\Handlers\DingTalk\MessageLoggedAlarm::class,
        ],
    ],

];
