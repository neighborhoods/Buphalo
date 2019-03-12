<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Factory;

use Neighborhoods\Bradfab\TargetActor\FactoryInterface;

trait AwareTrait
{
    protected $TargetActorFactory;

    public function setTargetActorFactory(FactoryInterface $TargetActorFactory): self
    {
        if ($this->hasTargetActorFactory()) {
            throw new \LogicException('TargetActorFactory is already set.');
        }
        $this->TargetActorFactory = $TargetActorFactory;

        return $this;
    }

    protected function getTargetActorFactory(): FactoryInterface
    {
        if (!$this->hasTargetActorFactory()) {
            throw new \LogicException('TargetActorFactory is not set.');
        }

        return $this->TargetActorFactory;
    }

    protected function hasTargetActorFactory(): bool
    {
        return isset($this->TargetActorFactory);
    }

    protected function unsetTargetActorFactory(): self
    {
        if (!$this->hasTargetActorFactory()) {
            throw new \LogicException('TargetActorFactory is not set.');
        }
        unset($this->TargetActorFactory);

        return $this;
    }
}
