<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName;

use LogicException;
use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorNameInterface;

trait AwareTrait
{
    protected $NamespacedPrimaryActorName;

    public function setNamespacedPrimaryActorName(PrimaryActorNameInterface $PrimaryActorName): self
    {
        if ($this->hasNamespacedPrimaryActorName()) {
            throw new LogicException('NamespacedPrimaryActorName is already set.');
        }
        $this->NamespacedPrimaryActorName = $PrimaryActorName;

        return $this;
    }

    protected function getNamespacedPrimaryActorName(): PrimaryActorNameInterface
    {
        if (!$this->hasNamespacedPrimaryActorName()) {
            throw new LogicException('NamespacedPrimaryActorName is not set.');
        }

        return $this->NamespacedPrimaryActorName;
    }

    protected function hasNamespacedPrimaryActorName(): bool
    {
        return isset($this->NamespacedPrimaryActorName);
    }

    protected function unsetNamespacedPrimaryActorName(): self
    {
        if (!$this->hasNamespacedPrimaryActorName()) {
            throw new LogicException('NamespacedPrimaryActorName is not set.');
        }
        unset($this->NamespacedPrimaryActorName);

        return $this;
    }
}
