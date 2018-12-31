<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\FabricationFile\Actor;

use Neighborhoods\Bradfab\FabricationFile\ActorInterface;

trait AwareTrait
{
    protected $FabricationFileActor;

    public function setFabricationFileActor(ActorInterface $FabricationFileActor): self
    {
        if ($this->hasFabricationFileActor()) {
            throw new \LogicException('FabricationFileActor is already set.');
        }
        $this->FabricationFileActor = $FabricationFileActor;

        return $this;
    }

    protected function getFabricationFileActor(): ActorInterface
    {
        if (!$this->hasFabricationFileActor()) {
            throw new \LogicException('FabricationFileActor is not set.');
        }

        return $this->FabricationFileActor;
    }

    protected function hasFabricationFileActor(): bool
    {
        return isset($this->FabricationFileActor);
    }

    protected function unsetFabricationFileActor(): self
    {
        if (!$this->hasFabricationFileActor()) {
            throw new \LogicException('FabricationFileActor is not set.');
        }
        unset($this->FabricationFileActor);

        return $this;
    }
}
