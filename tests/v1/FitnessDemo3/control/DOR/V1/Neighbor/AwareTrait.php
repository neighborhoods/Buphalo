<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\NeighborInterface;

trait AwareTrait
{
    protected $DORV1Neighbor;

    public function setDORV1Neighbor(NeighborInterface $Neighbor): self
    {
        if ($this->hasDORV1Neighbor()) {
            throw new LogicException('DORV1Neighbor is already set.');
        }
        $this->DORV1Neighbor = $Neighbor;

        return $this;
    }

    protected function getDORV1Neighbor(): NeighborInterface
    {
        if (!$this->hasDORV1Neighbor()) {
            throw new LogicException('DORV1Neighbor is not set.');
        }

        return $this->DORV1Neighbor;
    }

    protected function hasDORV1Neighbor(): bool
    {
        return isset($this->DORV1Neighbor);
    }

    protected function unsetDORV1Neighbor(): self
    {
        if (!$this->hasDORV1Neighbor()) {
            throw new LogicException('DORV1Neighbor is not set.');
        }
        unset($this->DORV1Neighbor);

        return $this;
    }
}
