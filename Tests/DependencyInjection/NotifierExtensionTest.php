<?php

namespace Notifier\NotifierBundle\Tests\DependencyInjection;

use Notifier\NotifierBundle\DependencyInjection\NotifierExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class NotifierExtensionTest extends \PHPUnit_Framework_TestCase
{
    /** @var ContainerBuilder */
    public $container;

    public function testConfigurationNamespace()
    {
        $container = new ContainerBuilder();
        $container->registerExtension(new NotifierExtension());

        $this->assertTrue($container->hasExtension('notifier'));
    }

    public function testLoadMinimalConfiguration()
    {
        $minRequiredConfig = array(
          'recipient_channel_resolver' => 'container',
        );

        $container = new ContainerBuilder();
        $extension = new NotifierExtension();

        $extension->load(array($minRequiredConfig), $container);

        $this->assertTrue($container->hasDefinition('notifier.channel_resolver'));
    }
}
