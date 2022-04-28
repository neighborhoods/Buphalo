<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Map\Factory;

use LogicException;
use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Map\FactoryInterface;

trait AwareTrait
{
    protected $NamespacedPrimaryActorNameMapFactory;

    public function setNamespacedPrimaryActorNameMapFactory(FactoryInterface $PrimaryActorNameMapFactory): self
    {
        if ($this->hasNamespacedPrimaryActorNameMapFactory()) {
            throw new LogicException('NamespacedPrimaryActorNameMapFactory is already set.');
        }
        $this->NamespacedPrimaryActorNameMapFactory = $PrimaryActorNameMapFactory;

        return $this;
    }

    protected function getNamespacedPrimaryActorNameMapFactory(): FactoryInterface
    {
        if (!$this->hasNamespacedPrimaryActorNameMapFactory()) {
            throw new LogicException('NamespacedPrimaryActorNameMapFactory is not set.');
        }

        return $this->NamespacedPrimaryActorNameMapFactory;
    }

    protected function hasNamespacedPrimaryActorNameMapFactory(): bool
    {
        return isset($this->NamespacedPrimaryActorNameMapFactory);
    }

    protected function unsetNamespacedPrimaryActorNameMapFactory(): self
    {
        if (!$this->hasNamespacedPrimaryActorNameMapFactory()) {
            throw new LogicException('NamespacedPrimaryActorNameMapFactory is not set.');
        }
        unset($this->NamespacedPrimaryActorNameMapFactory);

        return $this;
    }
}
