<?php

defined('_JEXEC') or die;

use Joomla\CMS\Extension\Service\Provider\HelperFactory;
use Joomla\CMS\Extension\Service\Provider\Module;
use Joomla\CMS\Extension\Service\Provider\ModuleDispatcherFactory;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

/**
 * The articles categories module service provider.
 *
 * @since  4.4.0
 */
return new class () implements ServiceProviderInterface {
    /**
     * Registers the service provider with a DI container.
     *
     * @param   Container  $container  The DI container.
     *
     * @return  void
     *
     * @since   4.4.0
     */
    public function register(Container $container)
    {
        $container->registerServiceProvider(new ModuleDispatcherFactory('\\NPEU\\Module\\Loadarticle'));
        $container->registerServiceProvider(new HelperFactory('\\NPEU\\Module\\Loadarticle\\Site\\Helper'));

        $container->registerServiceProvider(new Module());
    }
};
