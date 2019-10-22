<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Builder;

use LogicException;
use Neighborhoods\Buphalo\V1\Actor\BuilderInterface;

trait AwareTrait
{
    protected $NeighborhoodsBuphaloActorBuilder;

    public function setActorBuilder(BuilderInterface $actorBuilder): self
    {
        if ($this->hasActorBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Actor Builder is already set.');
        }
        $this->NeighborhoodsBuphaloActorBuilder = $actorBuilder;

        return $this;
    }

    protected function getActorBuilder(): BuilderInterface
    {
        if (!$this->hasActorBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Actor Builder is not set.');
        }

        return $this->NeighborhoodsBuphaloActorBuilder;
    }

    protected function hasActorBuilder(): bool
    {
        return isset($this->NeighborhoodsBuphaloActorBuilder);
    }

    protected function unsetActorBuilder(): self
    {
        if (!$this->hasActorBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Actor Builder is not set.');
        }
        unset($this->NeighborhoodsBuphaloActorBuilder);

        return $this;
    }
}
