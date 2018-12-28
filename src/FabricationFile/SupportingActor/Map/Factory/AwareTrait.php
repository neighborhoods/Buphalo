<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\SupportingActor\Map\Factory;

use Neighborhoods\Bradfab\FabricationFile\SupportingActor\Map\FactoryInterface;

trait AwareTrait
{
    protected $FabricationFileSupportingActorMapFactory;

    public function setFabricationFileSupportingActorMapFactory(FactoryInterface $FabricationFileSupportingActorMapFactory): self
    {
        if ($this->hasFabricationFileSupportingActorMapFactory()) {
            throw new \LogicException('FabricationFileSupportingActorMapFactory is already set.');
        }
        $this->FabricationFileSupportingActorMapFactory = $FabricationFileSupportingActorMapFactory;

        return $this;
    }

    protected function getFabricationFileSupportingActorMapFactory(): FactoryInterface
    {
        if (!$this->hasFabricationFileSupportingActorMapFactory()) {
            throw new \LogicException('FabricationFileSupportingActorMapFactory is not set.');
        }

        return $this->FabricationFileSupportingActorMapFactory;
    }

    protected function hasFabricationFileSupportingActorMapFactory(): bool
    {
        return isset($this->FabricationFileSupportingActorMapFactory);
    }

    protected function unsetFabricationFileSupportingActorMapFactory(): self
    {
        if (!$this->hasFabricationFileSupportingActorMapFactory()) {
            throw new \LogicException('FabricationFileSupportingActorMapFactory is not set.');
        }
        unset($this->FabricationFileSupportingActorMapFactory);

        return $this;
    }
}
