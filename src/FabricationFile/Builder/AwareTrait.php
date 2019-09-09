<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\FabricationFile\Builder;

use LogicException;
use Neighborhoods\Buphalo\FabricationFile\BuilderInterface;

trait AwareTrait
{
    protected $FabricationFileBuilder;

    public function setFabricationFileBuilder(BuilderInterface $FabricationFileBuilder): self
    {
        if ($this->hasFabricationFileBuilder()) {
            throw new LogicException('FabricationFileBuilder is already set.');
        }
        $this->FabricationFileBuilder = $FabricationFileBuilder;

        return $this;
    }

    protected function getFabricationFileBuilder(): BuilderInterface
    {
        if (!$this->hasFabricationFileBuilder()) {
            throw new LogicException('FabricationFileBuilder is not set.');
        }

        return $this->FabricationFileBuilder;
    }

    protected function hasFabricationFileBuilder(): bool
    {
        return isset($this->FabricationFileBuilder);
    }

    protected function unsetFabricationFileBuilder(): self
    {
        if (!$this->hasFabricationFileBuilder()) {
            throw new LogicException('FabricationFileBuilder is not set.');
        }
        unset($this->FabricationFileBuilder);

        return $this;
    }
}
