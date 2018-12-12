<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\Map\Builder;

use Rhift\BradFab\FabricationFile\Map\BuilderInterface;

trait AwareTrait
{
    protected $FabricationFileMapBuilder;

    public function setFabricationFileMapBuilder(BuilderInterface $FabricationFileMapBuilder): self
    {
        if ($this->hasFabricationFileMapBuilder()) {
            throw new \LogicException('FabricationFileMapBuilder is already set.');
        }
        $this->FabricationFileMapBuilder = $FabricationFileMapBuilder;

        return $this;
    }

    protected function getFabricationFileMapBuilder(): BuilderInterface
    {
        if (!$this->hasFabricationFileMapBuilder()) {
            throw new \LogicException('FabricationFileMapBuilder is not set.');
        }

        return $this->FabricationFileMapBuilder;
    }

    protected function hasFabricationFileMapBuilder(): bool
    {
        return isset($this->FabricationFileMapBuilder);
    }

    protected function unsetFabricationFileMapBuilder(): self
    {
        if (!$this->hasFabricationFileMapBuilder()) {
            throw new \LogicException('FabricationFileMapBuilder is not set.');
        }
        unset($this->FabricationFileMapBuilder);

        return $this;
    }
}
