<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\SupportingActor\Map;

use Rhift\Bradfab\FabricationFile\SupportingActor\MapInterface;

trait AwareTrait
{
    protected $SupportingActorMap;

    public function setSupportingActorMap(MapInterface $SupportingActorMap): self
    {
        if ($this->hasSupportingActorMap()) {
            throw new \LogicException('SupportingActorMap is already set.');
        }
        $this->SupportingActorMap = $SupportingActorMap;

        return $this;
    }

    protected function getSupportingActorMap(): MapInterface
    {
        if (!$this->hasSupportingActorMap()) {
            throw new \LogicException('SupportingActorMap is not set.');
        }

        return $this->SupportingActorMap;
    }

    protected function hasSupportingActorMap(): bool
    {
        return isset($this->SupportingActorMap);
    }

    protected function unsetSupportingActorMap(): self
    {
        if (!$this->hasSupportingActorMap()) {
            throw new \LogicException('SupportingActorMap is not set.');
        }
        unset($this->SupportingActorMap);

        return $this;
    }
}
