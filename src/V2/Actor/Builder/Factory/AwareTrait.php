<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Builder\Factory;

use LogicException;
use Neighborhoods\Buphalo\V2\Actor\Builder\FactoryInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloActorBuilderFactory;

    public function setActorBuilderFactory(FactoryInterface $actorBuilderFactory): self
    {
        if ($this->hasActorBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Actor Builder Factory is already set.');
        }
        $this->NeighborhoodsBuphaloActorBuilderFactory = $actorBuilderFactory;

        return $this;
    }

    protected function getActorBuilderFactory(): FactoryInterface
    {
        if (!$this->hasActorBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Actor Builder Factory is not set.');
        }

        return $this->NeighborhoodsBuphaloActorBuilderFactory;
    }

    protected function hasActorBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBuphaloActorBuilderFactory);
    }

    protected function unsetActorBuilderFactory(): self
    {
        if (!$this->hasActorBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Actor Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBuphaloActorBuilderFactory);

        return $this;
    }
}
