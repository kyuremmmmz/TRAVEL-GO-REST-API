<?php

namespace App\Providers;

use App\Models\Travel;
use App\Observers\TravelObserver;
use Illuminate\Support\ServiceProvider;

class EventServiceProviders extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Travel::observe(TravelObserver::class);
    }

    protected $Observers = ([
        Travel::class=>[TravelObserver::class]
    ]);
}
