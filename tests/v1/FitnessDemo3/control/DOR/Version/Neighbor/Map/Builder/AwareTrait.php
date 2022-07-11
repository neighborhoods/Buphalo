<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\Map\Builder;

use LogicException;
use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\Map\BuilderInterface;

trait AwareTrait
{
    protected $DORVersionNeighborMapBuilder;

    public function setDORVersionNeighborMapBuilder(BuilderInterface $NeighborMapBuilder): self
    {
        if ($this->hasDORVersionNeighborMapBuilder()) {
            throw new LogicException('DORVersionNeighborMapBuilder is already set.');
        }
        $this->DORVersionNeighborMapBuilder = $NeighborMapBuilder;

        return $this;
    }

    protected function getDORVersionNeighborMapBuilder(): BuilderInterface
    {
        if (!$this->hasDORVersionNeighborMapBuilder()) {
            throw new LogicException('DORVersionNeighborMapBuilder is not set.');
        }

        return $this->DORVersionNeighborMapBuilder;
    }

    protected function hasDORVersionNeighborMapBuilder(): bool
    {
        return isset($this->DORVersionNeighborMapBuilder);
    }

    protected function unsetDORVersionNeighborMapBuilder(): self
    {
        if (!$this->hasDORVersionNeighborMapBuilder()) {
            throw new LogicException('DORVersionNeighborMapBuilder is not set.');
        }
        unset($this->DORVersionNeighborMapBuilder);

        return $this;
    }
}
