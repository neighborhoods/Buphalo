<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\FabricationFile;

use LogicException;
use Neighborhoods\Buphalo\V1\FabricationFileInterface;

trait AwareTrait
{
    protected $FabricationFile;

    public function setFabricationFile(FabricationFileInterface $FabricationFile): self
    {
        if ($this->hasFabricationFile()) {
            throw new LogicException('FabricationFile is already set.');
        }
        $this->FabricationFile = $FabricationFile;

        return $this;
    }

    protected function getFabricationFile(): FabricationFileInterface
    {
        if (!$this->hasFabricationFile()) {
            throw new LogicException('FabricationFile is not set.');
        }

        return $this->FabricationFile;
    }

    protected function hasFabricationFile(): bool
    {
        return isset($this->FabricationFile);
    }

    protected function unsetFabricationFile(): self
    {
        if (!$this->hasFabricationFile()) {
            throw new LogicException('FabricationFile is not set.');
        }
        unset($this->FabricationFile);

        return $this;
    }
}
