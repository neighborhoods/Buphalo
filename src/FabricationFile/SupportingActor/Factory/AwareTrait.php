<?php
declare(strict_types=1);

namespace Rhift\Bradfab\FabricationFile\SupportingActor\Factory;

use Rhift\Bradfab\FabricationFile\SupportingActor\FactoryInterface;

trait AwareTrait
{
    protected $FabricationFileSupportingActorFactory;

    public function setFabricationFileSupportingActorFactory(FactoryInterface $FabricationFileSupportingActorFactory): self
    {
        if ($this->hasFabricationFileSupportingActorFactory()) {
            throw new \LogicException('FabricationFileSupportingActorFactory is already set.');
        }
        $this->FabricationFileSupportingActorFactory = $FabricationFileSupportingActorFactory;

        return $this;
    }

    protected function getFabricationFileSupportingActorFactory(): FactoryInterface
    {
        if (!$this->hasFabricationFileSupportingActorFactory()) {
            throw new \LogicException('FabricationFileSupportingActorFactory is not set.');
        }

        return $this->FabricationFileSupportingActorFactory;
    }

    protected function hasFabricationFileSupportingActorFactory(): bool
    {
        return isset($this->FabricationFileSupportingActorFactory);
    }

    protected function unsetFabricationFileSupportingActorFactory(): self
    {
        if (!$this->hasFabricationFileSupportingActorFactory()) {
            throw new \LogicException('FabricationFileSupportingActorFactory is not set.');
        }
        unset($this->FabricationFileSupportingActorFactory);

        return $this;
    }
}
