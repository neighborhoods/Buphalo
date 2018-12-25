<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\SupportingActor\Map\Builder\Factory;

use Rhift\Bradfab\FabricationFile\SupportingActor\Map\Builder\FactoryInterface;

trait AwareTrait
{
    protected $FabricationFileSupportingActorMapBuilderFactory;

    public function setFabricationFileSupportingActorMapBuilderFactory(FactoryInterface $FabricationFileSupportingActorMapBuilderFactory): self
    {
        if ($this->hasFabricationFileSupportingActorMapBuilderFactory()) {
            throw new \LogicException('FabricationFileSupportingActorMapBuilderFactory is already set.');
        }
        $this->FabricationFileSupportingActorMapBuilderFactory = $FabricationFileSupportingActorMapBuilderFactory;

        return $this;
    }

    protected function getFabricationFileSupportingActorMapBuilderFactory(): FactoryInterface
    {
        if (!$this->hasFabricationFileSupportingActorMapBuilderFactory()) {
            throw new \LogicException('FabricationFileSupportingActorMapBuilderFactory is not set.');
        }

        return $this->FabricationFileSupportingActorMapBuilderFactory;
    }

    protected function hasFabricationFileSupportingActorMapBuilderFactory(): bool
    {
        return isset($this->FabricationFileSupportingActorMapBuilderFactory);
    }

    protected function unsetFabricationFileSupportingActorMapBuilderFactory(): self
    {
        if (!$this->hasFabricationFileSupportingActorMapBuilderFactory()) {
            throw new \LogicException('FabricationFileSupportingActorMapBuilderFactory is not set.');
        }
        unset($this->FabricationFileSupportingActorMapBuilderFactory);

        return $this;
    }
}
