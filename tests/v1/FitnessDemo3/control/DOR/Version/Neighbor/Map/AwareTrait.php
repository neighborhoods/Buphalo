<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\Map;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\MapInterface;

trait AwareTrait
{
    protected $DORVersionNeighbors;

    public function setDORVersionNeighborMap(MapInterface $Neighbors): self
    {
        if ($this->hasDORVersionNeighborMap()) {
            throw new LogicException('DORVersionNeighbors is already set.');
        }
        $this->DORVersionNeighbors = $Neighbors;

        return $this;
    }

    protected function getDORVersionNeighborMap(): MapInterface
    {
        if (!$this->hasDORVersionNeighborMap()) {
            throw new LogicException('DORVersionNeighbors is not set.');
        }

        return $this->DORVersionNeighbors;
    }

    protected function hasDORVersionNeighborMap(): bool
    {
        return isset($this->DORVersionNeighbors);
    }

    protected function unsetDORVersionNeighborMap(): self
    {
        if (!$this->hasDORVersionNeighborMap()) {
            throw new LogicException('DORVersionNeighbors is not set.');
        }
        unset($this->DORVersionNeighbors);

        return $this;
    }
}
