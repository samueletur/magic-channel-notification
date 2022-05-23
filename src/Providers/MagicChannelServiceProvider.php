<?php

namespace Samueletur\MagicChannelNotification\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Notification;
use Samueletur\MagicChannelNotification\Channels\MagicChannel;

class MagicChannelServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/magic.php', 'magic');

        Notification::extend('magic', function ($app) {
            $config = new \Samueletur\MagicChannelNotification\Http\Config(config('magic'));

            return new MagicChannel($config);
        });
    }
}
