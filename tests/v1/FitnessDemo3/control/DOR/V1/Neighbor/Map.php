<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor;

use ArrayIterator;
use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\NeighborInterface;

class Map extends ArrayIterator implements MapInterface
{
    /** @param NeighborInterface ...$Neighbors */
    public function __construct(array $Neighbors = array(), int $flags = 0)
    {
        if ($this->count() !== 0) {
            throw new LogicException('Map is not empty.');
        }

        if (!empty($Neighbors)) {
            $this->assertValidArrayType(...array_values($Neighbors));
        }

        parent::__construct($Neighbors, $flags);
    }

    public function offsetGet($index): NeighborInterface
    {
        return $this->assertValidArrayItemType(parent::offsetGet($index));
    }

    /** @param NeighborInterface $Neighbor */
    public function offsetSet($index, $Neighbor)
    {
        parent::offsetSet($index, $this->assertValidArrayItemType($Neighbor));
    }

    /** @param NeighborInterface $Neighbor */
    public function append($Neighbor)
    {
        $this->assertValidArrayItemType($Neighbor);
        parent::append($Neighbor);
    }

    public function current(): NeighborInterface
    {
        return parent::current();
    }

    protected function assertValidArrayItemType(NeighborInterface $Neighbor)
    {
        return $Neighbor;
    }

    protected function assertValidArrayType(
        /** @noinspection PhpUnusedParameterInspection */
        NeighborInterface ...$Neighbors
    ): MapInterface {
        return $this;
    }

    public function getArrayCopy(): MapInterface
    {
        return new self(parent::getArrayCopy(), (int)$this->getFlags());
    }

    public function toArray(): array
    {
        return (array)$this;
    }

    /** @param NeighborInterface ...$Neighbors */
    public function hydrate(array $Neighbors): MapInterface
    {
        $this->__construct($Neighbors);

        return $this;
    }
}
