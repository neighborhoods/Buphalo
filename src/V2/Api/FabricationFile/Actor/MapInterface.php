<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Api\FabricationFile\Actor;

use Neighborhoods\Buphalo\V2\Api\FabricationFile\ActorInterface;

interface MapInterface extends \SeekableIterator, \ArrayAccess, \Serializable, \Countable
{
    /** @param ActorInterface ...$Actors */
    public function __construct(array $Actors = [], int $flags = 0);

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
