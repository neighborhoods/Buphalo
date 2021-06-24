<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\Map\Repository;

use Neighborhoods\BuphaloFitness\Demo3\DOR\V1\Car\Map\RepositoryInterface;

trait AwareTrait
{
    protected $DORV1CarMapRepository;

    public function setDORV1CarMapRepository(RepositoryInterface $CarMapRepository): self
    {
        if ($this->hasDORV1CarMapRepository()) {
            throw new \LogicException('DORV1CarMapRepository is already set.');
        }
        $this->DORV1CarMapRepository = $CarMapRepository;

        return $this;
    }

    protected function getDORV1CarMapRepository(): RepositoryInterface
    {
        if (!$this->hasDORV1CarMapRepository()) {
            throw new \LogicException('DORV1CarMapRepository is not set.');
        }

        return $this->DORV1CarMapRepository;
    }

    protected function hasDORV1CarMapRepository(): bool
    {
        return isset($this->DORV1CarMapRepository);
    }

    protected function unsetDORV1CarMapRepository(): self
    {
        if (!$this->hasDORV1CarMapRepository()) {
            throw new \LogicException('DORV1CarMapRepository is not set.');
        }
        unset($this->DORV1CarMapRepository);

        return $this;
    }
}
