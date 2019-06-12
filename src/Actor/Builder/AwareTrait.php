<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Builder;

use LogicException;
use Neighborhoods\Bradfab\Actor\BuilderInterface;

trait AwareTrait
{
    protected $NeighborhoodsBradfabActorBuilder;

    public function setActorBuilder(BuilderInterface $actorBuilder): self
    {
        if ($this->hasActorBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Actor Builder is already set.');
        }
        $this->NeighborhoodsBradfabActorBuilder = $actorBuilder;

        return $this;
    }

    protected function getActorBuilder(): BuilderInterface
    {
        if (!$this->hasActorBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Actor Builder is not set.');
        }

        return $this->NeighborhoodsBradfabActorBuilder;
    }

    protected function hasActorBuilder(): bool
    {
        return isset($this->NeighborhoodsBradfabActorBuilder);
    }

    protected function unsetActorBuilder(): self
    {
        if (!$this->hasActorBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Actor Builder is not set.');
        }
        unset($this->NeighborhoodsBradfabActorBuilder);

        return $this;
    }
}
