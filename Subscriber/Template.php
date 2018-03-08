<?php

namespace JlauteDevelopment\Subscriber;

use Enlight\Event\SubscriberInterface;
use Enlight_Event_EventArgs as EventArgs;
use JlauteDevelopment\Components\PluginConfig;

/**
 * @author    Jörg Lautenschlager <joerg.lautenschlager@gmail.com>
 */
class Template implements SubscriberInterface
{
    /**
     * @var string
     */
    private $viewDir;

    public static function getSubscribedEvents()
    {
        return [
            'Theme_Inheritance_Template_Directories_Collected' => ['onTemplateDirectoriesCollect', -600]
        ];
    }

    public function __construct(string $viewDir)
    {
        $this->viewDir = $viewDir;
    }

    public function onTemplateDirectoriesCollect(EventArgs $args)
    {
        $dirs = $args->getReturn();
        $dirs[] = $this->viewDir;
        $args->setReturn($dirs);
    }
}
