<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\SupportingActor\Builder;

use Neighborhoods\Bradfab\FabricationFile\SupportingActor\BuilderInterface;

trait AwareTrait
{
    protected $FabricationFileSupportingActorBuilder;

    public function setFabricationFileSupportingActorBuilder(BuilderInterface $FabricationFileSupportingActorBuilder): self
    {
        if ($this->hasFabricationFileSupportingActorBuilder()) {
            throw new \LogicException('FabricationFileSupportingActorBuilder is already set.');
        }
        $this->FabricationFileSupportingActorBuilder = $FabricationFileSupportingActorBuilder;

        return $this;
    }

    protected function getFabricationFileSupportingActorBuilder(): BuilderInterface
    {
        if (!$this->hasFabricationFileSupportingActorBuilder()) {
            throw new \LogicException('FabricationFileSupportingActorBuilder is not set.');
        }

        return $this->FabricationFileSupportingActorBuilder;
    }

    protected function hasFabricationFileSupportingActorBuilder(): bool
    {
        return isset($this->FabricationFileSupportingActorBuilder);
    }

    protected function unsetFabricationFileSupportingActorBuilder(): self
    {
        if (!$this->hasFabricationFileSupportingActorBuilder()) {
            throw new \LogicException('FabricationFileSupportingActorBuilder is not set.');
        }
        unset($this->FabricationFileSupportingActorBuilder);

        return $this;
    }
}
