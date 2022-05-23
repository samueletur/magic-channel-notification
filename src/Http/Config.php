<?php

namespace Samueletur\MagicChannelNotification\Http;

final class Config
{
    /**
     * @var string[]
     */
    private $config;

    /**
     * Initialize configuration
     * 
     * @param array $config
     * @return void
     */
    public function __construct(array $config = [])
    {
        $this->config = $this->merge($config, $this->getDefaultConfig());
    }

    /**
     * Get Config by key
     * 
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return data_get($this->config, $key, $default);
    }

    /**
     * Get default configuration
     * 
     * @return array
     */
    private function getDefaultConfig(): array
    {
        return require __DIR__ . '/../../config/magic.php';
    }

    /**
     * Merge arrays
     * 
     * @param array $high
     * @param array $low
     * @return array
     */
    private function merge(array $high, array $low): array
    {
        foreach ($high as $key => $value)
            if (!is_null($value)) $low[$key] = $value;

        return $low;
    }
}
