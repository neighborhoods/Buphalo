<?php
declare(strict_types=1);

namespace Rhift\Bradfab\Template\Actor;

use Rhift\Bradfab\Template\ActorInterface;

interface MapInterface extends \SeekableIterator, \ArrayAccess, \Serializable, \Countable
{
    /** @param ActorInterface ...$actors */
    public function __construct(array $actors = array(), int $flags = 0);

    public function offsetGet($index): ActorInterface;

    /** @param ActorInterface $actor */
    public function offsetSet($index, $actor);

    /** @param ActorInterface $actor */
    public function append($actor);

    public function current(): ActorInterface;

    public function getArrayCopy(): MapInterface;

    public function toArray(): array;

    public function hydrate(array $array): MapInterface;
}
