<?php
/**
 * This file is part of the SymfonyBundle package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Notifier\NotifierBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class ChannelPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('notifier')) {
            return;
        }
        $notifier = $container->getDefinition('notifier');
        foreach ($container->findTaggedServiceIds('notifier.channel') as $id => $attr) {
            $notifier->addMethodCall('addChannel', array(new Reference($id)));
        }
    }
}
