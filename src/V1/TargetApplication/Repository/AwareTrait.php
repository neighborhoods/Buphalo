<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\TargetApplication\Repository;

use LogicException;
use Neighborhoods\Buphalo\V1\TargetApplication\RepositoryInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloTargetApplicationRepository;

    public function setTargetApplicationRepository(RepositoryInterface $targetApplicationRepository): self
    {
        if ($this->hasTargetApplicationRepository()) {
            throw new LogicException('NeighborhoodsBuphaloTargetApplicationRepository is already set.');
        }
        $this->NeighborhoodsBuphaloTargetApplicationRepository = $targetApplicationRepository;

        return $this;
    }

    protected function getTargetApplicationRepository(): RepositoryInterface
    {
        if (!$this->hasTargetApplicationRepository()) {
            throw new LogicException('NeighborhoodsBuphaloTargetApplicationRepository is not set.');
        }

        return $this->NeighborhoodsBuphaloTargetApplicationRepository;
    }

    protected function hasTargetApplicationRepository(): bool
    {
        return isset($this->NeighborhoodsBuphaloTargetApplicationRepository);
    }

    protected function unsetTargetApplicationRepository(): self
    {
        if (!$this->hasTargetApplicationRepository()) {
            throw new LogicException('NeighborhoodsBuphaloTargetApplicationRepository is not set.');
        }
        unset($this->NeighborhoodsBuphaloTargetApplicationRepository);

        return $this;
    }
}
