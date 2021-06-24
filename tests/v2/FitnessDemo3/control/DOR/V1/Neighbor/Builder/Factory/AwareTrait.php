<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\Builder\Factory;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\Builder\FactoryInterface;

trait AwareTrait
{
    protected $DORV1NeighborBuilderFactory;

    public function setDORV1NeighborBuilderFactory(FactoryInterface $NeighborBuilderFactory): self
    {
        if ($this->hasDORV1NeighborBuilderFactory()) {
            throw new LogicException('DORV1NeighborBuilderFactory is already set.');
        }
        $this->DORV1NeighborBuilderFactory = $NeighborBuilderFactory;

        return $this;
    }

    protected function getDORV1NeighborBuilderFactory(): FactoryInterface
    {
        if (!$this->hasDORV1NeighborBuilderFactory()) {
            throw new LogicException('DORV1NeighborBuilderFactory is not set.');
        }

        return $this->DORV1NeighborBuilderFactory;
    }

    protected function hasDORV1NeighborBuilderFactory(): bool
    {
        return isset($this->DORV1NeighborBuilderFactory);
    }

    protected function unsetDORV1NeighborBuilderFactory(): self
    {
        if (!$this->hasDORV1NeighborBuilderFactory()) {
            throw new LogicException('DORV1NeighborBuilderFactory is not set.');
        }
        unset($this->DORV1NeighborBuilderFactory);

        return $this;
    }
}
