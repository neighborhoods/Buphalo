<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor;

use LogicException;
use Neighborhoods\Bradfab\ActorInterface;

trait AwareTrait
{
    protected $Actor;

    public function setTargetActor(ActorInterface $TargetActor): self
    {
        if ($this->hasTargetActor()) {
            throw new LogicException('Actor is already set.');
        }
        $this->Actor = $TargetActor;

        return $this;
    }

    protected function getTargetActor(): ActorInterface
    {
        if (!$this->hasTargetActor()) {
            throw new LogicException('Actor is not set.');
        }

        return $this->Actor;
    }

    protected function hasTargetActor(): bool
    {
        return isset($this->Actor);
    }

    protected function unsetTargetActor(): self
    {
        if (!$this->hasTargetActor()) {
            throw new LogicException('Actor is not set.');
        }
        unset($this->Actor);

        return $this;
    }
}
