<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Map\Repository;

use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Map\RepositoryInterface;

trait AwareTrait
{
    protected $NamespacedPrimaryActorNameMapRepository;

    public function setNamespacedPrimaryActorNameMapRepository(RepositoryInterface $PrimaryActorNameMapRepository): self
    {
        if ($this->hasNamespacedPrimaryActorNameMapRepository()) {
            throw new \LogicException('NamespacedPrimaryActorNameMapRepository is already set.');
        }
        $this->NamespacedPrimaryActorNameMapRepository = $PrimaryActorNameMapRepository;

        return $this;
    }

    protected function getNamespacedPrimaryActorNameMapRepository(): RepositoryInterface
    {
        if (!$this->hasNamespacedPrimaryActorNameMapRepository()) {
            throw new \LogicException('NamespacedPrimaryActorNameMapRepository is not set.');
        }

        return $this->NamespacedPrimaryActorNameMapRepository;
    }

    protected function hasNamespacedPrimaryActorNameMapRepository(): bool
    {
        return isset($this->NamespacedPrimaryActorNameMapRepository);
    }

    protected function unsetNamespacedPrimaryActorNameMapRepository(): self
    {
        if (!$this->hasNamespacedPrimaryActorNameMapRepository()) {
            throw new \LogicException('NamespacedPrimaryActorNameMapRepository is not set.');
        }
        unset($this->NamespacedPrimaryActorNameMapRepository);

        return $this;
    }
}
