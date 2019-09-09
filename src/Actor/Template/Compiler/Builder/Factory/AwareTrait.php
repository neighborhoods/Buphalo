<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Compiler\Builder\Factory;

use LogicException;
use Neighborhoods\Bradfab\Actor\Template\Compiler\Builder\FactoryInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBradfabActorTemplateCompilerBuilderFactory;

    public function setActorTemplateCompilerBuilderFactory(FactoryInterface $actorTemplateCompilerBuilderFactory): self
    {
        if ($this->hasActorTemplateCompilerBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template Compiler Builder Factory is already set.');
        }
        $this->NeighborhoodsBradfabActorTemplateCompilerBuilderFactory = $actorTemplateCompilerBuilderFactory;

        return $this;
    }

    protected function getActorTemplateCompilerBuilderFactory(): FactoryInterface
    {
        if (!$this->hasActorTemplateCompilerBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template Compiler Builder Factory is not set.');
        }

        return $this->NeighborhoodsBradfabActorTemplateCompilerBuilderFactory;
    }

    protected function hasActorTemplateCompilerBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBradfabActorTemplateCompilerBuilderFactory);
    }

    protected function unsetActorTemplateCompilerBuilderFactory(): self
    {
        if (!$this->hasActorTemplateCompilerBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template Compiler Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBradfabActorTemplateCompilerBuilderFactory);

        return $this;
    }
}
