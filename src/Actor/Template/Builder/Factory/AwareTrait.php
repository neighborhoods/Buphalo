<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Builder\Factory;

use LogicException;
use Neighborhoods\Bradfab\Actor\Template\Builder\FactoryInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBradfabActorTemplateBuilderFactory;

    public function setActorTemplateBuilderFactory(FactoryInterface $actorTemplateBuilderFactory): self
    {
        if ($this->hasActorTemplateBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template Builder Factory is already set.');
        }
        $this->NeighborhoodsBradfabActorTemplateBuilderFactory = $actorTemplateBuilderFactory;

        return $this;
    }

    protected function getActorTemplateBuilderFactory(): FactoryInterface
    {
        if (!$this->hasActorTemplateBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template Builder Factory is not set.');
        }

        return $this->NeighborhoodsBradfabActorTemplateBuilderFactory;
    }

    protected function hasActorTemplateBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBradfabActorTemplateBuilderFactory);
    }

    protected function unsetActorTemplateBuilderFactory(): self
    {
        if (!$this->hasActorTemplateBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBradfabActorTemplateBuilderFactory);

        return $this;
    }
}
