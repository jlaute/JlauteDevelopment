<?php
/**
 * © solutionDrive GmbH
 */

namespace JlauteDevelopment\Subscriber;

use Enlight\Event\SubscriberInterface;
use Enlight_Event_EventArgs as EventArgs;

/**
 * @author    Jörg Lautenschlager <jl@solutiondrive.de>
 */
class Backend implements SubscriberInterface
{
    /** @var array  */
    private $pluginConfig;

    /** @var string */
    private $backendViewDir;

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatch_Backend_Index' => 'onPostDispatchBackendIndex'
        ];
    }

    public function __construct(array $pluginConfig, string $backendViewDir)
    {
        $this->pluginConfig = $pluginConfig;
        $this->backendViewDir = $backendViewDir;
    }

    public function onPostDispatchBackendIndex(EventArgs $args)
    {
        /** @var \Enlight_View_Default $view */
        $view = $args->getSubject()->View();
        $view->assign($this->pluginConfig);
        $view->addTemplateDir($this->backendViewDir);
        $view->extendsTemplate('backend/index/jlaute_development/index.tpl');
    }
}
