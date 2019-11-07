<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\Map\Repository;

use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Neighbor\Map\RepositoryInterface;

trait AwareTrait
{
    protected $DORV1NeighborMapRepository;

    public function setDORV1NeighborMapRepository(RepositoryInterface $NeighborMapRepository): self
    {
        if ($this->hasDORV1NeighborMapRepository()) {
            throw new \LogicException('DORV1NeighborMapRepository is already set.');
        }
        $this->DORV1NeighborMapRepository = $NeighborMapRepository;

        return $this;
    }

    protected function getDORV1NeighborMapRepository(): RepositoryInterface
    {
        if (!$this->hasDORV1NeighborMapRepository()) {
            throw new \LogicException('DORV1NeighborMapRepository is not set.');
        }

        return $this->DORV1NeighborMapRepository;
    }

    protected function hasDORV1NeighborMapRepository(): bool
    {
        return isset($this->DORV1NeighborMapRepository);
    }

    protected function unsetDORV1NeighborMapRepository(): self
    {
        if (!$this->hasDORV1NeighborMapRepository()) {
            throw new \LogicException('DORV1NeighborMapRepository is not set.');
        }
        unset($this->DORV1NeighborMapRepository);

        return $this;
    }
}
