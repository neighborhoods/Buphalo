<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Variable\Compiler\Builder;

use Rhift\Bradfab\SupportingActor\Template\Variable\Compiler\BuilderInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateVariableCompilerBuilder;

    public function setSupportingActorTemplateVariableCompilerBuilder(BuilderInterface $CompilerBuilder): self
    {
        if ($this->hasSupportingActorTemplateVariableCompilerBuilder()) {
            throw new \LogicException('SupportingActorTemplateVariableCompilerBuilder is already set.');
        }
        $this->SupportingActorTemplateVariableCompilerBuilder = $CompilerBuilder;

        return $this;
    }

    protected function getSupportingActorTemplateVariableCompilerBuilder(): BuilderInterface
    {
        if (!$this->hasSupportingActorTemplateVariableCompilerBuilder()) {
            throw new \LogicException('SupportingActorTemplateVariableCompilerBuilder is not set.');
        }

        return $this->SupportingActorTemplateVariableCompilerBuilder;
    }

    protected function hasSupportingActorTemplateVariableCompilerBuilder(): bool
    {
        return isset($this->SupportingActorTemplateVariableCompilerBuilder);
    }

    protected function unsetSupportingActorTemplateVariableCompilerBuilder(): self
    {
        if (!$this->hasSupportingActorTemplateVariableCompilerBuilder()) {
            throw new \LogicException('SupportingActorTemplateVariableCompilerBuilder is not set.');
        }
        unset($this->SupportingActorTemplateVariableCompilerBuilder);

        return $this;
    }
}
