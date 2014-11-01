<?php
/**
 * This file is part of the SymfonyBundle package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Notifier\NotifierBundle\Type;

use Notifier\Channel\ChannelInterface;
use Notifier\Channel\ChannelStore;
use Notifier\Type\TypeInterface;
use Notifier\Type\TypeResolverInterface;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class TypeBLL implements TypeResolverInterface
{
    /**
     * @var array
     */
    private $rules;

    /**
     * @param $type
     * @param $channel
     */
    public function addRule($type, ChannelInterface $channel)
    {
        $this->rules[$type][] = $channel;
    }

    /**
     * @param  TypeInterface      $type
     * @param  ChannelStore       $channelStore
     * @return ChannelInterface[]
     */
    public function getChannels(TypeInterface $type, ChannelStore $channelStore)
    {
        if ($type instanceof Type && isset($this->rules[$type->getName()])) {
            return $this->rules[$type->getName()];
        }

        return array();
    }
}
