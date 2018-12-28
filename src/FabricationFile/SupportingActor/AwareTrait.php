<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\SupportingActor;

use Neighborhoods\Bradfab\FabricationFile\SupportingActorInterface;

trait AwareTrait
{
    protected $FabricationFileSupportingActor;

    public function setFabricationFileSupportingActor(SupportingActorInterface $FabricationFileSupportingActor): self
    {
        if ($this->hasFabricationFileSupportingActor()) {
            throw new \LogicException('FabricationFileSupportingActor is already set.');
        }
        $this->FabricationFileSupportingActor = $FabricationFileSupportingActor;

        return $this;
    }

    protected function getFabricationFileSupportingActor(): SupportingActorInterface
    {
        if (!$this->hasFabricationFileSupportingActor()) {
            throw new \LogicException('FabricationFileSupportingActor is not set.');
        }

        return $this->FabricationFileSupportingActor;
    }

    protected function hasFabricationFileSupportingActor(): bool
    {
        return isset($this->FabricationFileSupportingActor);
    }

    protected function unsetFabricationFileSupportingActor(): self
    {
        if (!$this->hasFabricationFileSupportingActor()) {
            throw new \LogicException('FabricationFileSupportingActor is not set.');
        }
        unset($this->FabricationFileSupportingActor);

        return $this;
    }
}
