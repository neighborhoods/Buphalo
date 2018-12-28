<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\SupportingActor\Map;

use Neighborhoods\Bradfab\FabricationFile\SupportingActor\MapInterface;

trait AwareTrait
{
    protected $FabricationFileSupportingActorMap;

    public function setFabricationFileSupportingActorMap(MapInterface $FabricationFileSupportingActorMap): self
    {
        if ($this->hasFabricationFileSupportingActorMap()) {
            throw new \LogicException('FabricationFileSupportingActorMap is already set.');
        }
        $this->FabricationFileSupportingActorMap = $FabricationFileSupportingActorMap;

        return $this;
    }

    protected function getFabricationFileSupportingActorMap(): MapInterface
    {
        if (!$this->hasFabricationFileSupportingActorMap()) {
            throw new \LogicException('FabricationFileSupportingActorMap is not set.');
        }

        return $this->FabricationFileSupportingActorMap;
    }

    protected function hasFabricationFileSupportingActorMap(): bool
    {
        return isset($this->FabricationFileSupportingActorMap);
    }

    protected function unsetFabricationFileSupportingActorMap(): self
    {
        if (!$this->hasFabricationFileSupportingActorMap()) {
            throw new \LogicException('FabricationFileSupportingActorMap is not set.');
        }
        unset($this->FabricationFileSupportingActorMap);

        return $this;
    }
}
