<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\NeighborInterface;

trait AwareTrait
{
    protected $DORVersionNeighbor;

    public function setDORVersionNeighbor(NeighborInterface $Neighbor): self
    {
        if ($this->hasDORVersionNeighbor()) {
            throw new LogicException('DORVersionNeighbor is already set.');
        }
        $this->DORVersionNeighbor = $Neighbor;

        return $this;
    }

    protected function getDORVersionNeighbor(): NeighborInterface
    {
        if (!$this->hasDORVersionNeighbor()) {
            throw new LogicException('DORVersionNeighbor is not set.');
        }

        return $this->DORVersionNeighbor;
    }

    protected function hasDORVersionNeighbor(): bool
    {
        return isset($this->DORVersionNeighbor);
    }

    protected function unsetDORVersionNeighbor(): self
    {
        if (!$this->hasDORVersionNeighbor()) {
            throw new LogicException('DORVersionNeighbor is not set.');
        }
        unset($this->DORVersionNeighbor);

        return $this;
    }
}
