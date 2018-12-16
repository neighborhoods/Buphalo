<?php
declare(strict_types=1);

namespace Rhift\Bradfab\TargetActor\Builder\Factory;

use Rhift\Bradfab\TargetActor\Builder\FactoryInterface;

trait AwareTrait
{
    protected $TargetActorBuilderFactory;

    public function setTargetActorBuilderFactory(FactoryInterface $TargetActorBuilderFactory): self
    {
        if ($this->hasTargetActorBuilderFactory()) {
            throw new \LogicException('TargetActorBuilderFactory is already set.');
        }
        $this->TargetActorBuilderFactory = $TargetActorBuilderFactory;

        return $this;
    }

    protected function getTargetActorBuilderFactory(): FactoryInterface
    {
        if (!$this->hasTargetActorBuilderFactory()) {
            throw new \LogicException('TargetActorBuilderFactory is not set.');
        }

        return $this->TargetActorBuilderFactory;
    }

    protected function hasTargetActorBuilderFactory(): bool
    {
        return isset($this->TargetActorBuilderFactory);
    }

    protected function unsetTargetActorBuilderFactory(): self
    {
        if (!$this->hasTargetActorBuilderFactory()) {
            throw new \LogicException('TargetActorBuilderFactory is not set.');
        }
        unset($this->TargetActorBuilderFactory);

        return $this;
    }
}
