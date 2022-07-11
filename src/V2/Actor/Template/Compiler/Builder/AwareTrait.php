<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template\Compiler\Builder;

use LogicException;
use Neighborhoods\Buphalo\V2\Actor\Template\Compiler\BuilderInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBuphaloActorTemplateCompilerBuilder;

    public function setActorTemplateCompilerBuilder(BuilderInterface $actorTemplateCompilerBuilder): self
    {
        if ($this->hasActorTemplateCompilerBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template Compiler Builder is already set.');
        }
        $this->NeighborhoodsBuphaloActorTemplateCompilerBuilder = $actorTemplateCompilerBuilder;

        return $this;
    }

    protected function getActorTemplateCompilerBuilder(): BuilderInterface
    {
        if (!$this->hasActorTemplateCompilerBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template Compiler Builder is not set.');
        }

        return $this->NeighborhoodsBuphaloActorTemplateCompilerBuilder;
    }

    protected function hasActorTemplateCompilerBuilder(): bool
    {
        return isset($this->NeighborhoodsBuphaloActorTemplateCompilerBuilder);
    }

    protected function unsetActorTemplateCompilerBuilder(): self
    {
        if (!$this->hasActorTemplateCompilerBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template Compiler Builder is not set.');
        }
        unset($this->NeighborhoodsBuphaloActorTemplateCompilerBuilder);

        return $this;
    }
}
