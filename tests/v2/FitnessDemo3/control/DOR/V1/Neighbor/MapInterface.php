<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor;

use ArrayAccess;
use Countable;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\NeighborInterface;
use SeekableIterator;
use Serializable;

interface MapInterface extends SeekableIterator, ArrayAccess, Serializable, Countable
{
    /** @param NeighborInterface ...$Neighbors */
    public function __construct(array $Neighbors = array(), int $flags = 0);

    public function offsetGet($index): NeighborInterface;

    /** @param NeighborInterface $Neighbor */
    public function offsetSet($index, $Neighbor);

    /** @param NeighborInterface $Neighbor */
    public function append($Neighbor);

    public function current(): NeighborInterface;

    public function getArrayCopy(): MapInterface;

    public function toArray(): array;

    /** @param NeighborInterface ...$Neighbors */
    public function hydrate(array $Neighbors): MapInterface;
}
