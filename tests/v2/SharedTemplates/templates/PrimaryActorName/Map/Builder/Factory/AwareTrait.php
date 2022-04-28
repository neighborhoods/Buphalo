<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Map\Builder\Factory;

use LogicException;
use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Map\Builder\FactoryInterface;

trait AwareTrait
{
    protected $NamespacedPrimaryActorNameMapBuilderFactory;

    public function setNamespacedPrimaryActorNameMapBuilderFactory(FactoryInterface $PrimaryActorNameMapBuilderFactory): self
    {
        if ($this->hasNamespacedPrimaryActorNameMapBuilderFactory()) {
            throw new LogicException('NamespacedPrimaryActorNameMapBuilderFactory is already set.');
        }
        $this->NamespacedPrimaryActorNameMapBuilderFactory = $PrimaryActorNameMapBuilderFactory;

        return $this;
    }

    protected function getNamespacedPrimaryActorNameMapBuilderFactory(): FactoryInterface
    {
        if (!$this->hasNamespacedPrimaryActorNameMapBuilderFactory()) {
            throw new LogicException('NamespacedPrimaryActorNameMapBuilderFactory is not set.');
        }

        return $this->NamespacedPrimaryActorNameMapBuilderFactory;
    }

    protected function hasNamespacedPrimaryActorNameMapBuilderFactory(): bool
    {
        return isset($this->NamespacedPrimaryActorNameMapBuilderFactory);
    }

    protected function unsetNamespacedPrimaryActorNameMapBuilderFactory(): self
    {
        if (!$this->hasNamespacedPrimaryActorNameMapBuilderFactory()) {
            throw new LogicException('NamespacedPrimaryActorNameMapBuilderFactory is not set.');
        }
        unset($this->NamespacedPrimaryActorNameMapBuilderFactory);

        return $this;
    }
}
