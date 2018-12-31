<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Actor\Map\Builder;

use Neighborhoods\Bradfab\FabricationFile\Actor\Map\BuilderInterface;

trait AwareTrait
{
    protected $FabricationFileActorMapBuilder;

    public function setFabricationFileActorMapBuilder(BuilderInterface $FabricationFileActorMapBuilder): self
    {
        if ($this->hasFabricationFileActorMapBuilder()) {
            throw new \LogicException('FabricationFileActorMapBuilder is already set.');
        }
        $this->FabricationFileActorMapBuilder = $FabricationFileActorMapBuilder;

        return $this;
    }

    protected function getFabricationFileActorMapBuilder(): BuilderInterface
    {
        if (!$this->hasFabricationFileActorMapBuilder()) {
            throw new \LogicException('FabricationFileActorMapBuilder is not set.');
        }

        return $this->FabricationFileActorMapBuilder;
    }

    protected function hasFabricationFileActorMapBuilder(): bool
    {
        return isset($this->FabricationFileActorMapBuilder);
    }

    protected function unsetFabricationFileActorMapBuilder(): self
    {
        if (!$this->hasFabricationFileActorMapBuilder()) {
            throw new \LogicException('FabricationFileActorMapBuilder is not set.');
        }
        unset($this->FabricationFileActorMapBuilder);

        return $this;
    }
}
