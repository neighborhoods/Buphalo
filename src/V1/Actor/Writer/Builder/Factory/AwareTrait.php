<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Writer\Builder\Factory;

use LogicException;
use Neighborhoods\Buphalo\V1\Actor\Writer\Builder\FactoryInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloActorWriterBuilderFactory;

    public function setActorWriterBuilderFactory(FactoryInterface $actorWriterBuilderFactory): self
    {
        if ($this->hasActorWriterBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Actor Writer Builder Factory is already set.');
        }
        $this->NeighborhoodsBuphaloActorWriterBuilderFactory = $actorWriterBuilderFactory;

        return $this;
    }

    protected function getActorWriterBuilderFactory(): FactoryInterface
    {
        if (!$this->hasActorWriterBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Actor Writer Builder Factory is not set.');
        }

        return $this->NeighborhoodsBuphaloActorWriterBuilderFactory;
    }

    protected function hasActorWriterBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBuphaloActorWriterBuilderFactory);
    }

    protected function unsetActorWriterBuilderFactory(): self
    {
        if (!$this->hasActorWriterBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Actor Writer Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBuphaloActorWriterBuilderFactory);

        return $this;
    }
}
