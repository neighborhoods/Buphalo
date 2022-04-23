<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\Map\Factory;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\Map\FactoryInterface;

trait AwareTrait
{
    protected $DORVersionNeighborMapFactory;

    public function setDORVersionNeighborMapFactory(FactoryInterface $NeighborMapFactory): self
    {
        if ($this->hasDORVersionNeighborMapFactory()) {
            throw new LogicException('DORVersionNeighborMapFactory is already set.');
        }
        $this->DORVersionNeighborMapFactory = $NeighborMapFactory;

        return $this;
    }

    protected function getDORVersionNeighborMapFactory(): FactoryInterface
    {
        if (!$this->hasDORVersionNeighborMapFactory()) {
            throw new LogicException('DORVersionNeighborMapFactory is not set.');
        }

        return $this->DORVersionNeighborMapFactory;
    }

    protected function hasDORVersionNeighborMapFactory(): bool
    {
        return isset($this->DORVersionNeighborMapFactory);
    }

    protected function unsetDORVersionNeighborMapFactory(): self
    {
        if (!$this->hasDORVersionNeighborMapFactory()) {
            throw new LogicException('DORVersionNeighborMapFactory is not set.');
        }
        unset($this->DORVersionNeighborMapFactory);

        return $this;
    }
}
