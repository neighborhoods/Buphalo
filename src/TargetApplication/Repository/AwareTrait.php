<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetApplication\Repository;

use Neighborhoods\Bradfab\TargetApplication\RepositoryInterface;

trait AwareTrait
{
    protected $NeighborhoodsBradfabTargetApplicationRepository;

    public function setTargetApplicationRepository(RepositoryInterface $targetApplicationRepository): self
    {
        if ($this->hasTargetApplicationRepository()) {
            throw new \LogicException('NeighborhoodsBradfabTargetApplicationRepository is already set.');
        }
        $this->NeighborhoodsBradfabTargetApplicationRepository = $targetApplicationRepository;

        return $this;
    }

    protected function getTargetApplicationRepository(): RepositoryInterface
    {
        if (!$this->hasTargetApplicationRepository()) {
            throw new \LogicException('NeighborhoodsBradfabTargetApplicationRepository is not set.');
        }

        return $this->NeighborhoodsBradfabTargetApplicationRepository;
    }

    protected function hasTargetApplicationRepository(): bool
    {
        return isset($this->NeighborhoodsBradfabTargetApplicationRepository);
    }

    protected function unsetTargetApplicationRepository(): self
    {
        if (!$this->hasTargetApplicationRepository()) {
            throw new \LogicException('NeighborhoodsBradfabTargetApplicationRepository is not set.');
        }
        unset($this->NeighborhoodsBradfabTargetApplicationRepository);

        return $this;
    }
}
