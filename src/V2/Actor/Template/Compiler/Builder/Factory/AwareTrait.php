<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template\Compiler\Builder\Factory;

use LogicException;
use Neighborhoods\Buphalo\V2\Actor\Template\Compiler\Builder\FactoryInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBuphaloActorTemplateCompilerBuilderFactory;

    public function setActorTemplateCompilerBuilderFactory(FactoryInterface $actorTemplateCompilerBuilderFactory): self
    {
        if ($this->hasActorTemplateCompilerBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template Compiler Builder Factory is already set.');
        }
        $this->NeighborhoodsBuphaloActorTemplateCompilerBuilderFactory = $actorTemplateCompilerBuilderFactory;

        return $this;
    }

    protected function getActorTemplateCompilerBuilderFactory(): FactoryInterface
    {
        if (!$this->hasActorTemplateCompilerBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template Compiler Builder Factory is not set.');
        }

        return $this->NeighborhoodsBuphaloActorTemplateCompilerBuilderFactory;
    }

    protected function hasActorTemplateCompilerBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBuphaloActorTemplateCompilerBuilderFactory);
    }

    protected function unsetActorTemplateCompilerBuilderFactory(): self
    {
        if (!$this->hasActorTemplateCompilerBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template Compiler Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBuphaloActorTemplateCompilerBuilderFactory);

        return $this;
    }
}
