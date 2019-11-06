<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\Factory;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\FactoryInterface;

trait AwareTrait
{
    protected $DORV1NeighborFactory;

    public function setDORV1NeighborFactory(FactoryInterface $NeighborFactory): self
    {
        if ($this->hasDORV1NeighborFactory()) {
            throw new LogicException('DORV1NeighborFactory is already set.');
        }
        $this->DORV1NeighborFactory = $NeighborFactory;

        return $this;
    }

    protected function getDORV1NeighborFactory(): FactoryInterface
    {
        if (!$this->hasDORV1NeighborFactory()) {
            throw new LogicException('DORV1NeighborFactory is not set.');
        }

        return $this->DORV1NeighborFactory;
    }

    protected function hasDORV1NeighborFactory(): bool
    {
        return isset($this->DORV1NeighborFactory);
    }

    protected function unsetDORV1NeighborFactory(): self
    {
        if (!$this->hasDORV1NeighborFactory()) {
            throw new LogicException('DORV1NeighborFactory is not set.');
        }
        unset($this->DORV1NeighborFactory);

        return $this;
    }
}
