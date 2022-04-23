<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\Builder;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\BuilderInterface;

trait AwareTrait
{
    protected $DORVersionNeighborBuilder;

    public function setDORVersionNeighborBuilder(BuilderInterface $NeighborBuilder): self
    {
        if ($this->hasDORVersionNeighborBuilder()) {
            throw new LogicException('DORVersionNeighborBuilder is already set.');
        }
        $this->DORVersionNeighborBuilder = $NeighborBuilder;

        return $this;
    }

    protected function getDORVersionNeighborBuilder(): BuilderInterface
    {
        if (!$this->hasDORVersionNeighborBuilder()) {
            throw new LogicException('DORVersionNeighborBuilder is not set.');
        }

        return $this->DORVersionNeighborBuilder;
    }

    protected function hasDORVersionNeighborBuilder(): bool
    {
        return isset($this->DORVersionNeighborBuilder);
    }

    protected function unsetDORVersionNeighborBuilder(): self
    {
        if (!$this->hasDORVersionNeighborBuilder()) {
            throw new LogicException('DORVersionNeighborBuilder is not set.');
        }
        unset($this->DORVersionNeighborBuilder);

        return $this;
    }
}
