<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Factory;

use LogicException;
use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\FactoryInterface;

trait AwareTrait
{
    protected $NamespacedPrimaryActorNameFactory;

    public function setNamespacedPrimaryActorNameFactory(FactoryInterface $PrimaryActorNameFactory): self
    {
        if ($this->hasNamespacedPrimaryActorNameFactory()) {
            throw new LogicException('NamespacedPrimaryActorNameFactory is already set.');
        }
        $this->NamespacedPrimaryActorNameFactory = $PrimaryActorNameFactory;

        return $this;
    }

    protected function getNamespacedPrimaryActorNameFactory(): FactoryInterface
    {
        if (!$this->hasNamespacedPrimaryActorNameFactory()) {
            throw new LogicException('NamespacedPrimaryActorNameFactory is not set.');
        }

        return $this->NamespacedPrimaryActorNameFactory;
    }

    protected function hasNamespacedPrimaryActorNameFactory(): bool
    {
        return isset($this->NamespacedPrimaryActorNameFactory);
    }

    protected function unsetNamespacedPrimaryActorNameFactory(): self
    {
        if (!$this->hasNamespacedPrimaryActorNameFactory()) {
            throw new LogicException('NamespacedPrimaryActorNameFactory is not set.');
        }
        unset($this->NamespacedPrimaryActorNameFactory);

        return $this;
    }
}
