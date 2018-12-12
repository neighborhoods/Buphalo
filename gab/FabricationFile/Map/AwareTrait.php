<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\Map;

use Rhift\Bradfab\FabricationFile\MapInterface;

trait AwareTrait
{
    protected $FabricationFileMap;

    public function setFabricationFileMap(MapInterface $FabricationFileMap): self
    {
        if ($this->hasFabricationFileMap()) {
            throw new \LogicException('FabricationFileMap is already set.');
        }
        $this->FabricationFileMap = $FabricationFileMap;

        return $this;
    }

    protected function getFabricationFileMap(): MapInterface
    {
        if (!$this->hasFabricationFileMap()) {
            throw new \LogicException('FabricationFileMap is not set.');
        }

        return $this->FabricationFileMap;
    }

    protected function hasFabricationFileMap(): bool
    {
        return isset($this->FabricationFileMap);
    }

    protected function unsetFabricationFileMap(): self
    {
        if (!$this->hasFabricationFileMap()) {
            throw new \LogicException('FabricationFileMap is not set.');
        }
        unset($this->FabricationFileMap);

        return $this;
    }
}
