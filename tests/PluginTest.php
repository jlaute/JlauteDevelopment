<?php

namespace JlauteDevelopment\Tests;

use JlauteDevelopment\JlauteDevelopment as Plugin;
use Shopware\Components\Test\Plugin\TestCase;

class PluginTest extends TestCase
{
    protected static $ensureLoadedPlugins = [
        'JlauteDevelopment' => []
    ];

    public function testCanCreateInstance()
    {
        /** @var Plugin $plugin */
        $plugin = Shopware()->Container()->get('kernel')->getPlugins()['JlauteDevelopment'];

        $this->assertInstanceOf(Plugin::class, $plugin);
    }
}
