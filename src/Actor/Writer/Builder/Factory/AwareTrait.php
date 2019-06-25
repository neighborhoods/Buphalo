<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Writer\Builder\Factory;

use LogicException;
use Neighborhoods\Bradfab\Actor\Writer\Builder\FactoryInterface;

trait AwareTrait
{
    protected $NeighborhoodsBradfabActorWriterBuilderFactory;

    public function setActorWriterBuilderFactory(FactoryInterface $actorWriterBuilderFactory): self
    {
        if ($this->hasActorWriterBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Actor Writer Builder Factory is already set.');
        }
        $this->NeighborhoodsBradfabActorWriterBuilderFactory = $actorWriterBuilderFactory;

        return $this;
    }

    protected function getActorWriterBuilderFactory(): FactoryInterface
    {
        if (!$this->hasActorWriterBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Actor Writer Builder Factory is not set.');
        }

        return $this->NeighborhoodsBradfabActorWriterBuilderFactory;
    }

    protected function hasActorWriterBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBradfabActorWriterBuilderFactory);
    }

    protected function unsetActorWriterBuilderFactory(): self
    {
        if (!$this->hasActorWriterBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Actor Writer Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBradfabActorWriterBuilderFactory);

        return $this;
    }
}
