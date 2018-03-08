<?php

namespace JlauteDevelopment\Subscriber;

use Enlight\Event\SubscriberInterface;
use JlauteDevelopment\Components\PluginConfig;

/**
 * @author    Jörg Lautenschlager <joerg.lautenschlager@gmail.com>
 */
class Frontend implements SubscriberInterface
{
    /** @var PluginConfig */
    private $pluginConfig;

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Frontend' => 'postDispatch'
        ];
    }

    public function __construct(PluginConfig $pluginConfig)
    {
        $this->pluginConfig = $pluginConfig;
    }

    public function postDispatch(\Enlight_Controller_ActionEventArgs $args)
    {
        $view = $args->getSubject()->View();
        $env = $this->pluginConfig->getEnvironment();
        $view->assign('jlauteEnvironment', $env);
    }
}
