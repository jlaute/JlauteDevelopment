<?php

namespace JlauteDevelopment;

use Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class JlauteDevelopment extends Plugin
{

    /**
    * @param ContainerBuilder $container
    */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('jlaute_development.plugin_dir', $this->getPath());
        parent::build($container);
    }
}
