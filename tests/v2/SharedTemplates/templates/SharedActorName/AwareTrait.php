<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\RelativeParentActorClassPath;

use LogicException;
use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\RelativeParentActorClassPathInterface;

trait AwareTrait
{
    protected $NamespacedParentActorName;

    public function setNamespacedParentActorName(ParentActorNameInterface $RelativeParentActorName): self
    {
        if ($this->hasNamespacedParentActorName()) {
            throw new LogicException('NamespacedParentActorName is already set.');
        }
        $this->NamespacedParentActorName = $RelativeParentActorName;

        return $this;
    }

    protected function getNamespacedParentActorName(): ParentActorNameInterface
    {
        if (!$this->hasNamespacedParentActorName()) {
            throw new LogicException('NamespacedParentActorName is not set.');
        }

        return $this->NamespacedParentActorName;
    }

    protected function hasNamespacedParentActorName(): bool
    {
        return isset($this->NamespacedParentActorName);
    }

    protected function unsetNamespacedParentActorName(): self
    {
        if (!$this->hasNamespacedParentActorName()) {
            throw new LogicException('NamespacedParentActorName is not set.');
        }
        unset($this->NamespacedParentActorName);

        return $this;
    }
}
