<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Repository;

use LogicException;
use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\RepositoryInterface;

trait AwareTrait
{
    protected $NamespacedPrimaryActorNameRepository;

    public function setNamespacedPrimaryActorNameRepository(RepositoryInterface $PrimaryActorNameRepository): self
    {
        if ($this->hasNamespacedPrimaryActorNameRepository()) {
            throw new LogicException('NamespacedPrimaryActorNameRepository is already set.');
        }
        $this->NamespacedPrimaryActorNameRepository = $PrimaryActorNameRepository;

        return $this;
    }

    protected function getNamespacedPrimaryActorNameRepository(): RepositoryInterface
    {
        if (!$this->hasNamespacedPrimaryActorNameRepository()) {
            throw new LogicException('NamespacedPrimaryActorNameRepository is not set.');
        }

        return $this->NamespacedPrimaryActorNameRepository;
    }

    protected function hasNamespacedPrimaryActorNameRepository(): bool
    {
        return isset($this->NamespacedPrimaryActorNameRepository);
    }

    protected function unsetNamespacedPrimaryActorNameRepository(): self
    {
        if (!$this->hasNamespacedPrimaryActorNameRepository()) {
            throw new LogicException('NamespacedPrimaryActorNameRepository is not set.');
        }
        unset($this->NamespacedPrimaryActorNameRepository);

        return $this;
    }
}
