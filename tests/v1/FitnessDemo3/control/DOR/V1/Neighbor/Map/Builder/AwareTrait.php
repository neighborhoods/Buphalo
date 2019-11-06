<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\Map\Builder;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\Map\BuilderInterface;

trait AwareTrait
{
    protected $DORV1NeighborMapBuilder;

    public function setDORV1NeighborMapBuilder(BuilderInterface $NeighborMapBuilder): self
    {
        if ($this->hasDORV1NeighborMapBuilder()) {
            throw new LogicException('DORV1NeighborMapBuilder is already set.');
        }
        $this->DORV1NeighborMapBuilder = $NeighborMapBuilder;

        return $this;
    }

    protected function getDORV1NeighborMapBuilder(): BuilderInterface
    {
        if (!$this->hasDORV1NeighborMapBuilder()) {
            throw new LogicException('DORV1NeighborMapBuilder is not set.');
        }

        return $this->DORV1NeighborMapBuilder;
    }

    protected function hasDORV1NeighborMapBuilder(): bool
    {
        return isset($this->DORV1NeighborMapBuilder);
    }

    protected function unsetDORV1NeighborMapBuilder(): self
    {
        if (!$this->hasDORV1NeighborMapBuilder()) {
            throw new LogicException('DORV1NeighborMapBuilder is not set.');
        }
        unset($this->DORV1NeighborMapBuilder);

        return $this;
    }
}
