<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\Map;

use LogicException;
use Neighborhoods\BuphaloTemplateTree\RelativeNamespace\PrimaryActorName\MapInterface;

trait AwareTrait
{
    protected $NamespacedPrimaryActorNames;

    public function setNamespacedPrimaryActorNameMap(MapInterface $PrimaryActorNames): self
    {
        if ($this->hasNamespacedPrimaryActorNameMap()) {
            throw new LogicException('NamespacedPrimaryActorNames is already set.');
        }
        $this->NamespacedPrimaryActorNames = $PrimaryActorNames;

        return $this;
    }

    protected function getNamespacedPrimaryActorNameMap(): MapInterface
    {
        if (!$this->hasNamespacedPrimaryActorNameMap()) {
            throw new LogicException('NamespacedPrimaryActorNames is not set.');
        }

        return $this->NamespacedPrimaryActorNames;
    }

    protected function hasNamespacedPrimaryActorNameMap(): bool
    {
        return isset($this->NamespacedPrimaryActorNames);
    }

    protected function unsetNamespacedPrimaryActorNameMap(): self
    {
        if (!$this->hasNamespacedPrimaryActorNameMap()) {
            throw new LogicException('NamespacedPrimaryActorNames is not set.');
        }
        unset($this->NamespacedPrimaryActorNames);

        return $this;
    }
}
