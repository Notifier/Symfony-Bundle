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
use Notifier\Channel\ChannelResolverInterface;
use Notifier\Channel\ChannelStore;
use Notifier\NotifierBundle\Type\Type;
use Notifier\Recipient\RecipientInterface;
use Notifier\Type\TypeInterface;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class ChannelResolver implements ChannelResolverInterface
{
    /**
     * @var array
     */
    private $rules;

    /**
     * @var RecipientChannelResolverInterface
     */
    private $recipientChannelResolver;

    public function __construct(RecipientChannelResolverInterface $recipientChannelResolver)
    {
        $this->recipientChannelResolver = $recipientChannelResolver;
    }

    /**
     * @param $type
     * @param $channel
     */
    public function addRule($type, ChannelInterface $channel)
    {
        $this->rules[$type][] = $channel;
    }

    /**
     * @param TypeInterface $type
     * @param ChannelStore $channelStore
     * @return ChannelInterface[]
     */
    public function getChannels(TypeInterface $type, ChannelStore $channelStore)
    {
        if ($type instanceof Type && isset($this->rules[$type->getName()]))
        {
            return $this->rules[$type->getName()];
        }

        return array();
    }

    /**
     * @param  RecipientInterface $recipient
     * @param  TypeInterface      $type
     * @param  ChannelInterface[] $channels
     * @return ChannelInterface[]
     */
    public function filterChannels(RecipientInterface $recipient, TypeInterface $type, array $channels)
    {
        return $this->recipientChannelResolver->filterChannels($recipient, $type, $channels);
    }
}
 