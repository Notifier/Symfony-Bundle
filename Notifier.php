<?php
/**
 * This file is part of the SymfonyBundle package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Notifier\NotifierBundle;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class Notifier extends \Notifier\Notifier
{
    public function __construct(ContainerInterface $container)
    {
        parent::__construct(
            $container->get('notifier.recipient_bll'),
            $container->get('notifier.type_bll')
        );
    }
}
 