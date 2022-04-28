<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Builder\Factory;

use LogicException;
use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Builder\FactoryInterface;

trait AwareTrait
{
    protected $NamespacedPrimaryActorNameBuilderFactory;

    public function setNamespacedPrimaryActorNameBuilderFactory(FactoryInterface $PrimaryActorNameBuilderFactory): self
    {
        if ($this->hasNamespacedPrimaryActorNameBuilderFactory()) {
            throw new LogicException('NamespacedPrimaryActorNameBuilderFactory is already set.');
        }
        $this->NamespacedPrimaryActorNameBuilderFactory = $PrimaryActorNameBuilderFactory;

        return $this;
    }

    protected function getNamespacedPrimaryActorNameBuilderFactory(): FactoryInterface
    {
        if (!$this->hasNamespacedPrimaryActorNameBuilderFactory()) {
            throw new LogicException('NamespacedPrimaryActorNameBuilderFactory is not set.');
        }

        return $this->NamespacedPrimaryActorNameBuilderFactory;
    }

    protected function hasNamespacedPrimaryActorNameBuilderFactory(): bool
    {
        return isset($this->NamespacedPrimaryActorNameBuilderFactory);
    }

    protected function unsetNamespacedPrimaryActorNameBuilderFactory(): self
    {
        if (!$this->hasNamespacedPrimaryActorNameBuilderFactory()) {
            throw new LogicException('NamespacedPrimaryActorNameBuilderFactory is not set.');
        }
        unset($this->NamespacedPrimaryActorNameBuilderFactory);

        return $this;
    }
}
