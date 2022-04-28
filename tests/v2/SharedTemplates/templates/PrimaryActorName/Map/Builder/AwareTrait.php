<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Map\Builder;

use LogicException;
use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Map\BuilderInterface;

trait AwareTrait
{
    protected $NamespacedPrimaryActorNameMapBuilder;

    public function setNamespacedPrimaryActorNameMapBuilder(BuilderInterface $PrimaryActorNameMapBuilder): self
    {
        if ($this->hasNamespacedPrimaryActorNameMapBuilder()) {
            throw new LogicException('NamespacedPrimaryActorNameMapBuilder is already set.');
        }
        $this->NamespacedPrimaryActorNameMapBuilder = $PrimaryActorNameMapBuilder;

        return $this;
    }

    protected function getNamespacedPrimaryActorNameMapBuilder(): BuilderInterface
    {
        if (!$this->hasNamespacedPrimaryActorNameMapBuilder()) {
            throw new LogicException('NamespacedPrimaryActorNameMapBuilder is not set.');
        }

        return $this->NamespacedPrimaryActorNameMapBuilder;
    }

    protected function hasNamespacedPrimaryActorNameMapBuilder(): bool
    {
        return isset($this->NamespacedPrimaryActorNameMapBuilder);
    }

    protected function unsetNamespacedPrimaryActorNameMapBuilder(): self
    {
        if (!$this->hasNamespacedPrimaryActorNameMapBuilder()) {
            throw new LogicException('NamespacedPrimaryActorNameMapBuilder is not set.');
        }
        unset($this->NamespacedPrimaryActorNameMapBuilder);

        return $this;
    }
}
