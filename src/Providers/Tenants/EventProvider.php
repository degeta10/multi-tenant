<?php

namespace Hyn\Tenancy\Providers\Tenants;

use Hyn\Tenancy\Listeners\AffectServicesListener;
use Hyn\Tenancy\Listeners\WebsiteUuidGeneration;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;

class EventProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $subscribe = [
        // Triggers all services.
        AffectServicesListener::class,
        // Sets the uuid value on a website based on tenancy configuration.
        WebsiteUuidGeneration::class,
    ];

    public function boot()
    {
        foreach ($this->subscribe as $listener) {
            $this->app[Dispatcher::class]->subscribe($listener);
        }
    }

    public function register()
    {
        // ..
    }
}
