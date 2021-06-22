<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\Map\Builder\Factory;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\Map\Builder\FactoryInterface;

trait AwareTrait
{
    protected $DORV1NeighborMapBuilderFactory;

    public function setDORV1NeighborMapBuilderFactory(FactoryInterface $NeighborMapBuilderFactory): self
    {
        if ($this->hasDORV1NeighborMapBuilderFactory()) {
            throw new LogicException('DORV1NeighborMapBuilderFactory is already set.');
        }
        $this->DORV1NeighborMapBuilderFactory = $NeighborMapBuilderFactory;

        return $this;
    }

    protected function getDORV1NeighborMapBuilderFactory(): FactoryInterface
    {
        if (!$this->hasDORV1NeighborMapBuilderFactory()) {
            throw new LogicException('DORV1NeighborMapBuilderFactory is not set.');
        }

        return $this->DORV1NeighborMapBuilderFactory;
    }

    protected function hasDORV1NeighborMapBuilderFactory(): bool
    {
        return isset($this->DORV1NeighborMapBuilderFactory);
    }

    protected function unsetDORV1NeighborMapBuilderFactory(): self
    {
        if (!$this->hasDORV1NeighborMapBuilderFactory()) {
            throw new LogicException('DORV1NeighborMapBuilderFactory is not set.');
        }
        unset($this->DORV1NeighborMapBuilderFactory);

        return $this;
    }
}
