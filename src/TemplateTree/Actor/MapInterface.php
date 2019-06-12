<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TemplateTree\Actor;

use ArrayAccess;
use Countable;
use Neighborhoods\Bradfab\TemplateTree\ActorInterface;
use SeekableIterator;
use Serializable;

interface MapInterface extends SeekableIterator, ArrayAccess, Serializable, Countable
{
    /** @param ActorInterface ...$Actors */
    public function __construct(array $Actors = array(), int $flags = 0);

    public function offsetGet($index): ActorInterface;

    /** @param ActorInterface $Actor */
    public function offsetSet($index, $Actor);

    /** @param ActorInterface $Actor */
    public function append($Actor);

    public function current(): ActorInterface;

    public function getArrayCopy(): MapInterface;

    public function toArray(): array;

    /** @param ActorInterface ...$Actors */
    public function hydrate(array $Actors): MapInterface;
}
