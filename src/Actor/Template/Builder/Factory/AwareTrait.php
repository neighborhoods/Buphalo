<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template\Builder\Factory;

use LogicException;
use Neighborhoods\Buphalo\Actor\Template\Builder\FactoryInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBuphaloActorTemplateBuilderFactory;

    public function setActorTemplateBuilderFactory(FactoryInterface $actorTemplateBuilderFactory): self
    {
        if ($this->hasActorTemplateBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template Builder Factory is already set.');
        }
        $this->NeighborhoodsBuphaloActorTemplateBuilderFactory = $actorTemplateBuilderFactory;

        return $this;
    }

    protected function getActorTemplateBuilderFactory(): FactoryInterface
    {
        if (!$this->hasActorTemplateBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template Builder Factory is not set.');
        }

        return $this->NeighborhoodsBuphaloActorTemplateBuilderFactory;
    }

    protected function hasActorTemplateBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBuphaloActorTemplateBuilderFactory);
    }

    protected function unsetActorTemplateBuilderFactory(): self
    {
        if (!$this->hasActorTemplateBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBuphaloActorTemplateBuilderFactory);

        return $this;
    }
}
