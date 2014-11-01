<?php

namespace Notifier\NotifierBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class NotifierExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        $this->registerRules($container, $config);
    }

    /**
     * @param ContainerBuilder $container
     * @param array            $config
     */
    private function registerRules(ContainerBuilder $container, array $config)
    {
        if (!$container->has('notifier.type_bll')) {
            return ;
        }

        foreach ($config['types'] as $type => $data) {
            foreach ($data['channels'] as $channelId) {
                $container->getDefinition('notifier.type_bll')
                    ->addMethodCall('addRule', array($type, new Reference($channelId)));
            }
        }
    }
}
