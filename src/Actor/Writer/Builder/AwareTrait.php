<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Writer\Builder;

use LogicException;
use Neighborhoods\Bradfab\Actor\Writer\BuilderInterface;

trait AwareTrait
{
    protected $NeighborhoodsBradfabActorWriterBuilder;

    public function setActorWriterBuilder(BuilderInterface $actorWriterBuilder): self
    {
        if ($this->hasActorWriterBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Actor Writer Builder is already set.');
        }
        $this->NeighborhoodsBradfabActorWriterBuilder = $actorWriterBuilder;

        return $this;
    }

    protected function getActorWriterBuilder(): BuilderInterface
    {
        if (!$this->hasActorWriterBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Actor Writer Builder is not set.');
        }

        return $this->NeighborhoodsBradfabActorWriterBuilder;
    }

    protected function hasActorWriterBuilder(): bool
    {
        return isset($this->NeighborhoodsBradfabActorWriterBuilder);
    }

    protected function unsetActorWriterBuilder(): self
    {
        if (!$this->hasActorWriterBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Actor Writer Builder is not set.');
        }
        unset($this->NeighborhoodsBradfabActorWriterBuilder);

        return $this;
    }
}
