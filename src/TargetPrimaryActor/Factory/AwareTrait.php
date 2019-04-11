<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetPrimaryActor\Factory;

use LogicException;
use Neighborhoods\Bradfab\TargetPrimaryActor\FactoryInterface;

trait AwareTrait
{
    protected $TargetPrimaryActorFactory;

    public function setTargetPrimaryActorFactory(FactoryInterface $TargetPrimaryActorFactory): self
    {
        if ($this->hasTargetPrimaryActorFactory()) {
            throw new LogicException('TargetPrimaryActorFactory is already set.');
        }
        $this->TargetPrimaryActorFactory = $TargetPrimaryActorFactory;

        return $this;
    }

    protected function getTargetPrimaryActorFactory(): FactoryInterface
    {
        if (!$this->hasTargetPrimaryActorFactory()) {
            throw new LogicException('TargetPrimaryActorFactory is not set.');
        }

        return $this->TargetPrimaryActorFactory;
    }

    protected function hasTargetPrimaryActorFactory(): bool
    {
        return isset($this->TargetPrimaryActorFactory);
    }

    protected function unsetTargetPrimaryActorFactory(): self
    {
        if (!$this->hasTargetPrimaryActorFactory()) {
            throw new LogicException('TargetPrimaryActorFactory is not set.');
        }
        unset($this->TargetPrimaryActorFactory);

        return $this;
    }
}
