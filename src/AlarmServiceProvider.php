<?php

namespace Aping\LaravelAlarm;

use Aping\LaravelAlarm\Listeners\AlarmListener;
use Illuminate\Support\ServiceProvider;

class AlarmServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([$this->configPath() => config_path('alarm.php')]);

        $this->mergeConfigFrom($this->configPath(), 'alarm');

        if (! $this->app->environment(config('alarm.env'))) {
            return;
        }

        $events = array_keys(config('alarm.events'));
        if (! is_array($events) || empty($events)) {
            return;
        }

        $this->app['events']->listen($events, AlarmListener::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * config path
     *
     * @return string
     */
    protected function configPath()
    {
        return __DIR__ . '/../config/alarm.php';
    }

}
