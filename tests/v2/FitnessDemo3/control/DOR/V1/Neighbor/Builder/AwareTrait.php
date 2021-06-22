<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\Builder;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\BuilderInterface;

trait AwareTrait
{
    protected $DORV1NeighborBuilder;

    public function setDORV1NeighborBuilder(BuilderInterface $NeighborBuilder): self
    {
        if ($this->hasDORV1NeighborBuilder()) {
            throw new LogicException('DORV1NeighborBuilder is already set.');
        }
        $this->DORV1NeighborBuilder = $NeighborBuilder;

        return $this;
    }

    protected function getDORV1NeighborBuilder(): BuilderInterface
    {
        if (!$this->hasDORV1NeighborBuilder()) {
            throw new LogicException('DORV1NeighborBuilder is not set.');
        }

        return $this->DORV1NeighborBuilder;
    }

    protected function hasDORV1NeighborBuilder(): bool
    {
        return isset($this->DORV1NeighborBuilder);
    }

    protected function unsetDORV1NeighborBuilder(): self
    {
        if (!$this->hasDORV1NeighborBuilder()) {
            throw new LogicException('DORV1NeighborBuilder is not set.');
        }
        unset($this->DORV1NeighborBuilder);

        return $this;
    }
}
