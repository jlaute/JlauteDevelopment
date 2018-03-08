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

    /** @var \Enlight_Template_Manager */
    private $view;

    /** @var string */
    private $backendViewDir;

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatch_Backend_Index' => 'onPostDispatchBackendIndex'
        ];
    }

    public function __construct(PluginConfig $pluginConfig, \Enlight_Template_Manager $view, string $backendViewDir)
    {
        $this->pluginConfig = $pluginConfig;
        $this->view = $view;
        $this->backendViewDir = $backendViewDir;
    }

    public function onPostDispatchBackendIndex(EventArgs $args)
    {
        /** @var \Enlight_View_Default $view */
        $view = $args->getSubject()->View();
        $view->addTemplateDir($this->backendViewDir);
        $view->extendsTemplate('backend/index/jlaute_development/index.tpl');

        $environment = $this->pluginConfig->getEnvironment();
        $this->view->assign('jlauteEnvironment', $environment);
    }
}
