<?php

namespace Samueletur\MagicChannelNotification\Channels;

use Illuminate\Support\Facades\Http;
use Illuminate\Notifications\Notification;
use Samueletur\MagicChannelNotification\Http\Config;

class MagicChannel
{
    /**
     * Config current instance
     * 
     * @var \Samueletur\MagicChannelNotification\Http\Config
     */
    private $config;

    public function __construct(Config $config = null)
    {
        $this->config = $config;
    }

    public function send($notifiable, Notification $notification)
    {
        $data = $notification->toArray($notifiable);

        $data['mm2_codigo'] = $this->config->get('credentials.mm2_codigo');

        if (empty($data)) {
            return;
        }

        $url = $this->config->get('urls.default');

        if (!empty($data['template']))
            $url = $this->config->get('urls.template');

        Http::post($url, $data);

        return true;
    }
}
