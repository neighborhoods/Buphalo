<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\PrimaryActorName\Repository;

use LogicException;
use Neighborhoods\BuphaloTemplateTree\PrimaryActorName\RepositoryInterface;

trait AwareTrait
{
    protected $PrimaryActorNameRepository;

    public function setPrimaryActorNameRepository(RepositoryInterface $PrimaryActorNameRepository): self
    {
        if ($this->hasPrimaryActorNameRepository()) {
            throw new LogicException('PrimaryActorNameRepository is already set.');
        }
        $this->PrimaryActorNameRepository = $PrimaryActorNameRepository;

        return $this;
    }

    protected function getPrimaryActorNameRepository(): RepositoryInterface
    {
        if (!$this->hasPrimaryActorNameRepository()) {
            throw new LogicException('PrimaryActorNameRepository is not set.');
        }

        return $this->PrimaryActorNameRepository;
    }

    protected function hasPrimaryActorNameRepository(): bool
    {
        return isset($this->PrimaryActorNameRepository);
    }

    protected function unsetPrimaryActorNameRepository(): self
    {
        if (!$this->hasPrimaryActorNameRepository()) {
            throw new LogicException('PrimaryActorNameRepository is not set.');
        }
        unset($this->PrimaryActorNameRepository);

        return $this;
    }
}
