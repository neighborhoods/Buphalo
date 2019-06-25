<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Compiler\Builder;

use LogicException;
use Neighborhoods\Bradfab\Actor\Template\Compiler\BuilderInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBradfabActorTemplateCompilerBuilder;

    public function setActorTemplateCompilerBuilder(BuilderInterface $actorTemplateCompilerBuilder): self
    {
        if ($this->hasActorTemplateCompilerBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template Compiler Builder is already set.');
        }
        $this->NeighborhoodsBradfabActorTemplateCompilerBuilder = $actorTemplateCompilerBuilder;

        return $this;
    }

    protected function getActorTemplateCompilerBuilder(): BuilderInterface
    {
        if (!$this->hasActorTemplateCompilerBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template Compiler Builder is not set.');
        }

        return $this->NeighborhoodsBradfabActorTemplateCompilerBuilder;
    }

    protected function hasActorTemplateCompilerBuilder(): bool
    {
        return isset($this->NeighborhoodsBradfabActorTemplateCompilerBuilder);
    }

    protected function unsetActorTemplateCompilerBuilder(): self
    {
        if (!$this->hasActorTemplateCompilerBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template Compiler Builder is not set.');
        }
        unset($this->NeighborhoodsBradfabActorTemplateCompilerBuilder);

        return $this;
    }
}
