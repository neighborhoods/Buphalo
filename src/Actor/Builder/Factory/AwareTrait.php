<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Builder\Factory;

use LogicException;
use Neighborhoods\Bradfab\Actor\Builder\FactoryInterface;

trait AwareTrait
{
    protected $NeighborhoodsBradfabActorBuilderFactory;

    public function setActorBuilderFactory(FactoryInterface $actorBuilderFactory): self
    {
        if ($this->hasActorBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Actor Builder Factory is already set.');
        }
        $this->NeighborhoodsBradfabActorBuilderFactory = $actorBuilderFactory;

        return $this;
    }

    protected function getActorBuilderFactory(): FactoryInterface
    {
        if (!$this->hasActorBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Actor Builder Factory is not set.');
        }

        return $this->NeighborhoodsBradfabActorBuilderFactory;
    }

    protected function hasActorBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBradfabActorBuilderFactory);
    }

    protected function unsetActorBuilderFactory(): self
    {
        if (!$this->hasActorBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Actor Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBradfabActorBuilderFactory);

        return $this;
    }
}
