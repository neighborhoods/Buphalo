<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\Map;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\MapInterface;

trait AwareTrait
{
    protected $DORV1Neighbors;

    public function setDORV1NeighborMap(MapInterface $Neighbors): self
    {
        if ($this->hasDORV1NeighborMap()) {
            throw new LogicException('DORV1Neighbors is already set.');
        }
        $this->DORV1Neighbors = $Neighbors;

        return $this;
    }

    protected function getDORV1NeighborMap(): MapInterface
    {
        if (!$this->hasDORV1NeighborMap()) {
            throw new LogicException('DORV1Neighbors is not set.');
        }

        return $this->DORV1Neighbors;
    }

    protected function hasDORV1NeighborMap(): bool
    {
        return isset($this->DORV1Neighbors);
    }

    protected function unsetDORV1NeighborMap(): self
    {
        if (!$this->hasDORV1NeighborMap()) {
            throw new LogicException('DORV1Neighbors is not set.');
        }
        unset($this->DORV1Neighbors);

        return $this;
    }
}
