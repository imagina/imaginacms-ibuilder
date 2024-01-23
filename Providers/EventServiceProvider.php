<?php

namespace Modules\Ibuilder\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Modules\Ibuilder\Events\Handlers\SetDefaultLayout;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
    ];
    public function register()
    {
      Event::listen(
        "Modules\\Ibuilder\\Events\\LayoutWasCreated",
        [SetDefaultLayout::class, 'handle']
      );

      Event::listen(
        "Modules\\Ibuilder\\Events\\LayoutWasUpdated",
        [SetDefaultLayout::class, 'handle']
      );
    }
}
