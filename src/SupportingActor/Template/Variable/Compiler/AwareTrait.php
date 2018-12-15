<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Variable\Compiler;

use Rhift\Bradfab\SupportingActor\Template\Variable\CompilerInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateVariableCompiler;

    public function setSupportingActorTemplateVariableCompiler(CompilerInterface $Compiler): self
    {
        if ($this->hasSupportingActorTemplateVariableCompiler()) {
            throw new \LogicException('SupportingActorTemplateVariableCompiler is already set.');
        }
        $this->SupportingActorTemplateVariableCompiler = $Compiler;

        return $this;
    }

    protected function getSupportingActorTemplateVariableCompiler(): CompilerInterface
    {
        if (!$this->hasSupportingActorTemplateVariableCompiler()) {
            throw new \LogicException('SupportingActorTemplateVariableCompiler is not set.');
        }

        return $this->SupportingActorTemplateVariableCompiler;
    }

    protected function hasSupportingActorTemplateVariableCompiler(): bool
    {
        return isset($this->SupportingActorTemplateVariableCompiler);
    }

    protected function unsetSupportingActorTemplateVariableCompiler(): self
    {
        if (!$this->hasSupportingActorTemplateVariableCompiler()) {
            throw new \LogicException('SupportingActorTemplateVariableCompiler is not set.');
        }
        unset($this->SupportingActorTemplateVariableCompiler);

        return $this;
    }
}
