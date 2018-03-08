<?php

namespace JlauteDevelopment\Components;

/**
 * @author    Jörg Lautenschlager <joerg.lautenschlager@gmail.com>
 */
class PluginConfig
{
    /** @var array */
    private $config;

    /** @var string */
    private $environment;

    public function __construct(array $config, string $environment)
    {
        $this->config = $config;
        $this->environment = $environment;
    }

    public function getEnvironment(): string
    {
        if ($this->config['jlaute_is_dev']) {
            return 'dev';
        }

        if ($this->config['jlaute_is_staging']) {
            return 'staging';
        }

        if ($this->environment !== 'production') {
            return $this->environment;
        }

        return '';
    }

    public function toArray(): array
    {
        return $this->config;
    }
}
