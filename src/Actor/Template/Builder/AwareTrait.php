<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Builder;

use LogicException;
use Neighborhoods\Bradfab\Actor\Template\BuilderInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBradfabActorTemplateBuilder;

    public function setActorTemplateBuilder(BuilderInterface $actorTemplateBuilder): self
    {
        if ($this->hasActorTemplateBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template Builder is already set.');
        }
        $this->NeighborhoodsBradfabActorTemplateBuilder = $actorTemplateBuilder;

        return $this;
    }

    protected function getActorTemplateBuilder(): BuilderInterface
    {
        if (!$this->hasActorTemplateBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template Builder is not set.');
        }

        return $this->NeighborhoodsBradfabActorTemplateBuilder;
    }

    protected function hasActorTemplateBuilder(): bool
    {
        return isset($this->NeighborhoodsBradfabActorTemplateBuilder);
    }

    protected function unsetActorTemplateBuilder(): self
    {
        if (!$this->hasActorTemplateBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template Builder is not set.');
        }
        unset($this->NeighborhoodsBradfabActorTemplateBuilder);

        return $this;
    }
}
