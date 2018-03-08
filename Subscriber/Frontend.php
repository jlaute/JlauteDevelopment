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

    /** @var \Enlight_Template_Manager */
    private $view;

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Frontend' => 'postDispatch'
        ];
    }

    public function __construct(PluginConfig $pluginConfig, \Enlight_Template_Manager $view)
    {
        $this->pluginConfig = $pluginConfig;
        $this->view = $view;
    }

    public function postDispatch(\Enlight_Controller_ActionEventArgs $args)
    {
        $env = $this->pluginConfig->getEnvironment();
        $this->view->assign('jlauteEnvironment', $env);
    }
}
