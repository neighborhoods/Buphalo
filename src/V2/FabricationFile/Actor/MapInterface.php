<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile\Actor;

use ArrayAccess;
use Countable;
use Neighborhoods\Buphalo\V2\FabricationFile\ActorInterface;
use SeekableIterator;
use Serializable;

interface MapInterface extends SeekableIterator, ArrayAccess, Serializable, Countable
{
    /** @param ActorInterface ...$Actors */
    public function __construct(array $Actors = [], int $flags = 0);

    public function offsetGet($index): ActorInterface;

    /** @param ActorInterface $Actor */
    public function offsetSet($index, $Actor): void;

    /** @param ActorInterface $Actor */
    public function append($Actor): void;

    public function current(): ActorInterface;

    public function getArrayCopy(): MapInterface;

    public function toArray(): array;

    public function hydrate(array $Actors): MapInterface;
}
