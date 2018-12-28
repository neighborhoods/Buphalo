<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\SupportingActor\Builder\Factory;

use Neighborhoods\Bradfab\FabricationFile\SupportingActor\Builder\FactoryInterface;

trait AwareTrait
{
    protected $FabricationFileSupportingActorBuilderFactory;

    public function setFabricationFileSupportingActorBuilderFactory(FactoryInterface $FabricationFileSupportingActorBuilderFactory): self
    {
        if ($this->hasFabricationFileSupportingActorBuilderFactory()) {
            throw new \LogicException('FabricationFileSupportingActorBuilderFactory is already set.');
        }
        $this->FabricationFileSupportingActorBuilderFactory = $FabricationFileSupportingActorBuilderFactory;

        return $this;
    }

    protected function getFabricationFileSupportingActorBuilderFactory(): FactoryInterface
    {
        if (!$this->hasFabricationFileSupportingActorBuilderFactory()) {
            throw new \LogicException('FabricationFileSupportingActorBuilderFactory is not set.');
        }

        return $this->FabricationFileSupportingActorBuilderFactory;
    }

    protected function hasFabricationFileSupportingActorBuilderFactory(): bool
    {
        return isset($this->FabricationFileSupportingActorBuilderFactory);
    }

    protected function unsetFabricationFileSupportingActorBuilderFactory(): self
    {
        if (!$this->hasFabricationFileSupportingActorBuilderFactory()) {
            throw new \LogicException('FabricationFileSupportingActorBuilderFactory is not set.');
        }
        unset($this->FabricationFileSupportingActorBuilderFactory);

        return $this;
    }
}
