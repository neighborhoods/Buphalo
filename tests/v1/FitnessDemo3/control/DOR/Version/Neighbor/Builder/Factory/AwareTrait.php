<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\Builder\Factory;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\Builder\FactoryInterface;

trait AwareTrait
{
    protected $DORVersionNeighborBuilderFactory;

    public function setDORVersionNeighborBuilderFactory(FactoryInterface $NeighborBuilderFactory): self
    {
        if ($this->hasDORVersionNeighborBuilderFactory()) {
            throw new LogicException('DORVersionNeighborBuilderFactory is already set.');
        }
        $this->DORVersionNeighborBuilderFactory = $NeighborBuilderFactory;

        return $this;
    }

    protected function getDORVersionNeighborBuilderFactory(): FactoryInterface
    {
        if (!$this->hasDORVersionNeighborBuilderFactory()) {
            throw new LogicException('DORVersionNeighborBuilderFactory is not set.');
        }

        return $this->DORVersionNeighborBuilderFactory;
    }

    protected function hasDORVersionNeighborBuilderFactory(): bool
    {
        return isset($this->DORVersionNeighborBuilderFactory);
    }

    protected function unsetDORVersionNeighborBuilderFactory(): self
    {
        if (!$this->hasDORVersionNeighborBuilderFactory()) {
            throw new LogicException('DORVersionNeighborBuilderFactory is not set.');
        }
        unset($this->DORVersionNeighborBuilderFactory);

        return $this;
    }
}
