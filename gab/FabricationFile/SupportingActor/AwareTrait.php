<?php
declare(strict_types=1);

namespace Rhift\BradFab\FabricationFile\SupportingActor;

use Rhift\BradFab\FabricationFile\SupportingActorInterface;

trait AwareTrait
{
    protected $SupportingActor;

    public function setSupportingActor(SupportingActorInterface $SupportingActor): self
    {
        if ($this->hasSupportingActor()) {
            throw new \LogicException('SupportingActor is already set.');
        }
        $this->SupportingActor = $SupportingActor;

        return $this;
    }

    protected function getSupportingActor(): SupportingActorInterface
    {
        if (!$this->hasSupportingActor()) {
            throw new \LogicException('SupportingActor is not set.');
        }

        return $this->SupportingActor;
    }

    protected function hasSupportingActor(): bool
    {
        return isset($this->SupportingActor);
    }

    protected function unsetSupportingActor(): self
    {
        if (!$this->hasSupportingActor()) {
            throw new \LogicException('SupportingActor is not set.');
        }
        unset($this->SupportingActor);

        return $this;
    }
}
