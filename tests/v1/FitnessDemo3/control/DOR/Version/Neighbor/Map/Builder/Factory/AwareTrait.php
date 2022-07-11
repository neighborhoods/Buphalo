<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\Map\Builder\Factory;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\Map\Builder\FactoryInterface;

trait AwareTrait
{
    protected $DORVersionNeighborMapBuilderFactory;

    public function setDORVersionNeighborMapBuilderFactory(FactoryInterface $NeighborMapBuilderFactory): self
    {
        if ($this->hasDORVersionNeighborMapBuilderFactory()) {
            throw new LogicException('DORVersionNeighborMapBuilderFactory is already set.');
        }
        $this->DORVersionNeighborMapBuilderFactory = $NeighborMapBuilderFactory;

        return $this;
    }

    protected function getDORVersionNeighborMapBuilderFactory(): FactoryInterface
    {
        if (!$this->hasDORVersionNeighborMapBuilderFactory()) {
            throw new LogicException('DORVersionNeighborMapBuilderFactory is not set.');
        }

        return $this->DORVersionNeighborMapBuilderFactory;
    }

    protected function hasDORVersionNeighborMapBuilderFactory(): bool
    {
        return isset($this->DORVersionNeighborMapBuilderFactory);
    }

    protected function unsetDORVersionNeighborMapBuilderFactory(): self
    {
        if (!$this->hasDORVersionNeighborMapBuilderFactory()) {
            throw new LogicException('DORVersionNeighborMapBuilderFactory is not set.');
        }
        unset($this->DORVersionNeighborMapBuilderFactory);

        return $this;
    }
}
