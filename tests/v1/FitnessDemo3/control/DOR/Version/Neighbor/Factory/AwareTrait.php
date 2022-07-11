<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\Factory;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\FactoryInterface;

trait AwareTrait
{
    protected $DORVersionNeighborFactory;

    public function setDORVersionNeighborFactory(FactoryInterface $NeighborFactory): self
    {
        if ($this->hasDORVersionNeighborFactory()) {
            throw new LogicException('DORVersionNeighborFactory is already set.');
        }
        $this->DORVersionNeighborFactory = $NeighborFactory;

        return $this;
    }

    protected function getDORVersionNeighborFactory(): FactoryInterface
    {
        if (!$this->hasDORVersionNeighborFactory()) {
            throw new LogicException('DORVersionNeighborFactory is not set.');
        }

        return $this->DORVersionNeighborFactory;
    }

    protected function hasDORVersionNeighborFactory(): bool
    {
        return isset($this->DORVersionNeighborFactory);
    }

    protected function unsetDORVersionNeighborFactory(): self
    {
        if (!$this->hasDORVersionNeighborFactory()) {
            throw new LogicException('DORVersionNeighborFactory is not set.');
        }
        unset($this->DORVersionNeighborFactory);

        return $this;
    }
}
