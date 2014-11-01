<?php

namespace Notifier\NotifierBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Notifier\NotifierBundle\DependencyInjection\Compiler;

class NotifierBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new Compiler\ChannelPass());
        $container->addCompilerPass(new Compiler\ProcessorPass());
    }
}
