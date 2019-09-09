<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Writer\Builder;

use LogicException;
use Neighborhoods\Buphalo\Actor\Writer\BuilderInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloActorWriterBuilder;

    public function setActorWriterBuilder(BuilderInterface $actorWriterBuilder): self
    {
        if ($this->hasActorWriterBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Actor Writer Builder is already set.');
        }
        $this->NeighborhoodsBuphaloActorWriterBuilder = $actorWriterBuilder;

        return $this;
    }

    protected function getActorWriterBuilder(): BuilderInterface
    {
        if (!$this->hasActorWriterBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Actor Writer Builder is not set.');
        }

        return $this->NeighborhoodsBuphaloActorWriterBuilder;
    }

    protected function hasActorWriterBuilder(): bool
    {
        return isset($this->NeighborhoodsBuphaloActorWriterBuilder);
    }

    protected function unsetActorWriterBuilder(): self
    {
        if (!$this->hasActorWriterBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Actor Writer Builder is not set.');
        }
        unset($this->NeighborhoodsBuphaloActorWriterBuilder);

        return $this;
    }
}
