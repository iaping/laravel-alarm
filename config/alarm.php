<?php

return [

    /**
     * 报警环境
     */
    'env' => env('ALARM_ENV', 'production'),

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
        'webhook' => 'https://oapi.dingtalk.com/robot/send?access_token=e4c2827ce067c352010e2cb199e5301ead946677d0f3988517c092d52155fc55',
    ],

];
