<?php
declare(strict_types=1);

namespace Rhift\Bradfab\TargetActor\Builder;

use Rhift\Bradfab\TargetActor\BuilderInterface;

trait AwareTrait
{
    protected $TargetActorBuilder;

    public function setTargetActorBuilder(BuilderInterface $TargetActorBuilder): self
    {
        if ($this->hasTargetActorBuilder()) {
            throw new \LogicException('TargetActorBuilder is already set.');
        }
        $this->TargetActorBuilder = $TargetActorBuilder;

        return $this;
    }

    protected function getTargetActorBuilder(): BuilderInterface
    {
        if (!$this->hasTargetActorBuilder()) {
            throw new \LogicException('TargetActorBuilder is not set.');
        }

        return $this->TargetActorBuilder;
    }

    protected function hasTargetActorBuilder(): bool
    {
        return isset($this->TargetActorBuilder);
    }

    protected function unsetTargetActorBuilder(): self
    {
        if (!$this->hasTargetActorBuilder()) {
            throw new \LogicException('TargetActorBuilder is not set.');
        }
        unset($this->TargetActorBuilder);

        return $this;
    }
}
