<?php
/**
 * This file is part of the SymfonyBundle package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Notifier\NotifierBundle\Notifier;

use Notifier\Channel\ChannelInterface;
use Notifier\Recipient\RecipientInterface;
use Notifier\Type\TypeInterface;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
interface RecipientChannelResolverInterface
{
    /**
     * @param  RecipientInterface $recipient
     * @param  TypeInterface      $type
     * @param  ChannelInterface[] $channels
     * @return ChannelInterface[]
     */
    public function filterChannels(RecipientInterface $recipient, TypeInterface $type, array $channels);
}
