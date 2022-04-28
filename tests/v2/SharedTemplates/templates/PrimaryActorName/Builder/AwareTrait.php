<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Builder;

use LogicException;
use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\BuilderInterface;

trait AwareTrait
{
    protected $NamespacedPrimaryActorNameBuilder;

    public function setNamespacedPrimaryActorNameBuilder(BuilderInterface $PrimaryActorNameBuilder): self
    {
        if ($this->hasNamespacedPrimaryActorNameBuilder()) {
            throw new LogicException('NamespacedPrimaryActorNameBuilder is already set.');
        }
        $this->NamespacedPrimaryActorNameBuilder = $PrimaryActorNameBuilder;

        return $this;
    }

    protected function getNamespacedPrimaryActorNameBuilder(): BuilderInterface
    {
        if (!$this->hasNamespacedPrimaryActorNameBuilder()) {
            throw new LogicException('NamespacedPrimaryActorNameBuilder is not set.');
        }

        return $this->NamespacedPrimaryActorNameBuilder;
    }

    protected function hasNamespacedPrimaryActorNameBuilder(): bool
    {
        return isset($this->NamespacedPrimaryActorNameBuilder);
    }

    protected function unsetNamespacedPrimaryActorNameBuilder(): self
    {
        if (!$this->hasNamespacedPrimaryActorNameBuilder()) {
            throw new LogicException('NamespacedPrimaryActorNameBuilder is not set.');
        }
        unset($this->NamespacedPrimaryActorNameBuilder);

        return $this;
    }
}
