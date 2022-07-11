<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\Map\Repository;

use Neighborhoods\BuphaloFitness\Demo3\DOR\Version\Neighbor\Map\RepositoryInterface;

trait AwareTrait
{
    protected $DORVersionNeighborMapRepository;

    public function setDORVersionNeighborMapRepository(RepositoryInterface $NeighborMapRepository): self
    {
        if ($this->hasDORVersionNeighborMapRepository()) {
            throw new \LogicException('DORVersionNeighborMapRepository is already set.');
        }
        $this->DORVersionNeighborMapRepository = $NeighborMapRepository;

        return $this;
    }

    protected function getDORVersionNeighborMapRepository(): RepositoryInterface
    {
        if (!$this->hasDORVersionNeighborMapRepository()) {
            throw new \LogicException('DORVersionNeighborMapRepository is not set.');
        }

        return $this->DORVersionNeighborMapRepository;
    }

    protected function hasDORVersionNeighborMapRepository(): bool
    {
        return isset($this->DORVersionNeighborMapRepository);
    }

    protected function unsetDORVersionNeighborMapRepository(): self
    {
        if (!$this->hasDORVersionNeighborMapRepository()) {
            throw new \LogicException('DORVersionNeighborMapRepository is not set.');
        }
        unset($this->DORVersionNeighborMapRepository);

        return $this;
    }
}
