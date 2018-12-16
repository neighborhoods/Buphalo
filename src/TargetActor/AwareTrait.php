<?php
declare(strict_types=1);

namespace Rhift\Bradfab\TargetActor;

use Rhift\Bradfab\TargetActorInterface;

trait AwareTrait
{
    protected $TargetActor;

    public function setTargetActor(TargetActorInterface $TargetActor): self
    {
        if ($this->hasTargetActor()) {
            throw new \LogicException('TargetActor is already set.');
        }
        $this->TargetActor = $TargetActor;

        return $this;
    }

    protected function getTargetActor(): TargetActorInterface
    {
        if (!$this->hasTargetActor()) {
            throw new \LogicException('TargetActor is not set.');
        }

        return $this->TargetActor;
    }

    protected function hasTargetActor(): bool
    {
        return isset($this->TargetActor);
    }

    protected function unsetTargetActor(): self
    {
        if (!$this->hasTargetActor()) {
            throw new \LogicException('TargetActor is not set.');
        }
        unset($this->TargetActor);

        return $this;
    }
}
