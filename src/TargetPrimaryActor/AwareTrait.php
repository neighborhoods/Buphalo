<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetPrimaryActor;

use LogicException;
use Neighborhoods\Bradfab\TargetPrimaryActorInterface;

trait AwareTrait
{
    protected $TargetPrimaryActor;

    public function setTargetPrimaryActor(TargetPrimaryActorInterface $TargetPrimaryActor): self
    {
        if ($this->hasTargetPrimaryActor()) {
            throw new LogicException('TargetPrimaryActor is already set.');
        }
        $this->TargetPrimaryActor = $TargetPrimaryActor;

        return $this;
    }

    protected function getTargetPrimaryActor(): TargetPrimaryActorInterface
    {
        if (!$this->hasTargetPrimaryActor()) {
            throw new LogicException('TargetPrimaryActor is not set.');
        }

        return $this->TargetPrimaryActor;
    }

    protected function hasTargetPrimaryActor(): bool
    {
        return isset($this->TargetPrimaryActor);
    }

    protected function unsetTargetPrimaryActor(): self
    {
        if (!$this->hasTargetPrimaryActor()) {
            throw new LogicException('TargetPrimaryActor is not set.');
        }
        unset($this->TargetPrimaryActor);

        return $this;
    }
}
