<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\FabricationFile\Map;

use LogicException;
use Neighborhoods\Buphalo\V2\FabricationFile\MapInterface;

trait AwareTrait
{
    protected $FabricationFiles;

    public function setFabricationFileMap(MapInterface $FabricationFiles): self
    {
        if ($this->hasFabricationFileMap()) {
            throw new LogicException('FabricationFiles is already set.');
        }
        $this->FabricationFiles = $FabricationFiles;

        return $this;
    }

    protected function getFabricationFileMap(): MapInterface
    {
        if (!$this->hasFabricationFileMap()) {
            throw new LogicException('FabricationFiles is not set.');
        }

        return $this->FabricationFiles;
    }

    protected function hasFabricationFileMap(): bool
    {
        return isset($this->FabricationFiles);
    }

    protected function unsetFabricationFileMap(): self
    {
        if (!$this->hasFabricationFileMap()) {
            throw new LogicException('FabricationFiles is not set.');
        }
        unset($this->FabricationFiles);

        return $this;
    }
}
