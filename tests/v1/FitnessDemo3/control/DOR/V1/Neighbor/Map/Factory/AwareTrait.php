<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\Map\Factory;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\Map\FactoryInterface;

trait AwareTrait
{
    protected $DORV1NeighborMapFactory;

    public function setDORV1NeighborMapFactory(FactoryInterface $NeighborMapFactory): self
    {
        if ($this->hasDORV1NeighborMapFactory()) {
            throw new LogicException('DORV1NeighborMapFactory is already set.');
        }
        $this->DORV1NeighborMapFactory = $NeighborMapFactory;

        return $this;
    }

    protected function getDORV1NeighborMapFactory(): FactoryInterface
    {
        if (!$this->hasDORV1NeighborMapFactory()) {
            throw new LogicException('DORV1NeighborMapFactory is not set.');
        }

        return $this->DORV1NeighborMapFactory;
    }

    protected function hasDORV1NeighborMapFactory(): bool
    {
        return isset($this->DORV1NeighborMapFactory);
    }

    protected function unsetDORV1NeighborMapFactory(): self
    {
        if (!$this->hasDORV1NeighborMapFactory()) {
            throw new LogicException('DORV1NeighborMapFactory is not set.');
        }
        unset($this->DORV1NeighborMapFactory);

        return $this;
    }
}
