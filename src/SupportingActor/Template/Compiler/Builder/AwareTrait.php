<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Compiler\Builder;

use Rhift\Bradfab\SupportingActor\Template\Compiler\BuilderInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateCompilerBuilder;

    public function setSupportingActorTemplateCompilerBuilder(BuilderInterface $CompilerBuilder): self
    {
        if ($this->hasSupportingActorTemplateCompilerBuilder()) {
            throw new \LogicException('SupportingActorTemplateCompilerBuilder is already set.');
        }
        $this->SupportingActorTemplateCompilerBuilder = $CompilerBuilder;

        return $this;
    }

    protected function getSupportingActorTemplateCompilerBuilder(): BuilderInterface
    {
        if (!$this->hasSupportingActorTemplateCompilerBuilder()) {
            throw new \LogicException('SupportingActorTemplateCompilerBuilder is not set.');
        }

        return $this->SupportingActorTemplateCompilerBuilder;
    }

    protected function hasSupportingActorTemplateCompilerBuilder(): bool
    {
        return isset($this->SupportingActorTemplateCompilerBuilder);
    }

    protected function unsetSupportingActorTemplateCompilerBuilder(): self
    {
        if (!$this->hasSupportingActorTemplateCompilerBuilder()) {
            throw new \LogicException('SupportingActorTemplateCompilerBuilder is not set.');
        }
        unset($this->SupportingActorTemplateCompilerBuilder);

        return $this;
    }
}
