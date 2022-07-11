<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template\Builder;

use LogicException;
use Neighborhoods\Buphalo\V2\Actor\Template\BuilderInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBuphaloActorTemplateBuilder;

    public function setActorTemplateBuilder(BuilderInterface $actorTemplateBuilder): self
    {
        if ($this->hasActorTemplateBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template Builder is already set.');
        }
        $this->NeighborhoodsBuphaloActorTemplateBuilder = $actorTemplateBuilder;

        return $this;
    }

    protected function getActorTemplateBuilder(): BuilderInterface
    {
        if (!$this->hasActorTemplateBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template Builder is not set.');
        }

        return $this->NeighborhoodsBuphaloActorTemplateBuilder;
    }

    protected function hasActorTemplateBuilder(): bool
    {
        return isset($this->NeighborhoodsBuphaloActorTemplateBuilder);
    }

    protected function unsetActorTemplateBuilder(): self
    {
        if (!$this->hasActorTemplateBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template Builder is not set.');
        }
        unset($this->NeighborhoodsBuphaloActorTemplateBuilder);

        return $this;
    }
}
