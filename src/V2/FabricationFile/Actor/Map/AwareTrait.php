<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile\Actor\Map;

use LogicException;
use Neighborhoods\Buphalo\V2\FabricationFile\Actor\MapInterface;

trait AwareTrait
{
    protected $FabricationFileActorMap;

    public function setFabricationFileActorMap(MapInterface $FabricationFileActorMap): self
    {
        if ($this->hasFabricationFileActorMap()) {
            throw new LogicException('FabricationFileActorMap is already set.');
        }
        $this->FabricationFileActorMap = $FabricationFileActorMap;

        return $this;
    }

    protected function getFabricationFileActorMap(): MapInterface
    {
        if (!$this->hasFabricationFileActorMap()) {
            throw new LogicException('FabricationFileActorMap is not set.');
        }

        return $this->FabricationFileActorMap;
    }

    protected function hasFabricationFileActorMap(): bool
    {
        return isset($this->FabricationFileActorMap);
    }

    protected function unsetFabricationFileActorMap(): self
    {
        if (!$this->hasFabricationFileActorMap()) {
            throw new LogicException('FabricationFileActorMap is not set.');
        }
        unset($this->FabricationFileActorMap);

        return $this;
    }
}
