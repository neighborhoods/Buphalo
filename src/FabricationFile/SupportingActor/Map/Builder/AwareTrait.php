<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\SupportingActor\Map\Builder;

use LogicException;
use Neighborhoods\Bradfab\FabricationFile\SupportingActor\Map\BuilderInterface;

trait AwareTrait
{
    protected $FabricationFileSupportingActorMapBuilder;

    public function setFabricationFileSupportingActorMapBuilder(BuilderInterface $FabricationFileSupportingActorMapBuilder): self
    {
        if ($this->hasFabricationFileSupportingActorMapBuilder()) {
            throw new LogicException('FabricationFileSupportingActorMapBuilder is already set.');
        }
        $this->FabricationFileSupportingActorMapBuilder = $FabricationFileSupportingActorMapBuilder;

        return $this;
    }

    protected function getFabricationFileSupportingActorMapBuilder(): BuilderInterface
    {
        if (!$this->hasFabricationFileSupportingActorMapBuilder()) {
            throw new LogicException('FabricationFileSupportingActorMapBuilder is not set.');
        }

        return $this->FabricationFileSupportingActorMapBuilder;
    }

    protected function hasFabricationFileSupportingActorMapBuilder(): bool
    {
        return isset($this->FabricationFileSupportingActorMapBuilder);
    }

    protected function unsetFabricationFileSupportingActorMapBuilder(): self
    {
        if (!$this->hasFabricationFileSupportingActorMapBuilder()) {
            throw new LogicException('FabricationFileSupportingActorMapBuilder is not set.');
        }
        unset($this->FabricationFileSupportingActorMapBuilder);

        return $this;
    }
}
