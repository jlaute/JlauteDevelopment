<?php

namespace JlauteDevelopment\Subscriber;

use Enlight\Event\SubscriberInterface;
use Enlight_Event_EventArgs as EventArgs;
use JlauteDevelopment\Components\PluginConfig;

/**
 * @author    Jörg Lautenschlager <joerg.lautenschlager@gmail.com>
 */
class Backend implements SubscriberInterface
{
    /** @var PluginConfig  */
    private $pluginConfig;

    /** @var string */
    private $backendViewDir;

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatch_Backend_Index' => 'onPostDispatchBackendIndex'
        ];
    }

    public function __construct(PluginConfig $pluginConfig, string $backendViewDir)
    {
        $this->pluginConfig = $pluginConfig;
        $this->backendViewDir = $backendViewDir;
    }

    public function onPostDispatchBackendIndex(EventArgs $args)
    {
        /** @var \Enlight_View_Default $view */
        $view = $args->getSubject()->View();
        $view->assign($this->pluginConfig->toArray());
        $view->addTemplateDir($this->backendViewDir);
        $view->extendsTemplate('backend/index/jlaute_development/index.tpl');
    }
}
