<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\RegistrationForCourseEvent::class => [
            \App\Listeners\OldCourseListener::class,
            \App\Listeners\ReEntryListener::class,
            \App\Listeners\OverCountListener::class,
        ],
    ];
}
