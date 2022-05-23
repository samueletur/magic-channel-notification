<?php

namespace Samueletur\MagicChannelNotification;

use Illuminate\Support\Facades\Http;

class Magic
{

    public function __construct()
    {
        $this->config = new \Samueletur\MagicChannelNotification\Http\Config(config('magic'));
    }

    /**
     * Get config
     * 
     * @param string $key
     * @param string $default
     * @return mixed
     */
    public function getConfig(string $key, $default = null)
    {
        return $this->config->get($key, $default);
    }
}
