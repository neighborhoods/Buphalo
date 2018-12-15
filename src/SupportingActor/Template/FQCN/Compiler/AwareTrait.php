<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\FQCN\Compiler;

use Rhift\Bradfab\SupportingActor\Template\FQCN\CompilerInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateFQCNCompiler;

    public function setSupportingActorTemplateFQCNCompiler(CompilerInterface $Compiler): self
    {
        if ($this->hasSupportingActorTemplateFQCNCompiler()) {
            throw new \LogicException('SupportingActorTemplateFQCNCompiler is already set.');
        }
        $this->SupportingActorTemplateFQCNCompiler = $Compiler;

        return $this;
    }

    protected function getSupportingActorTemplateFQCNCompiler(): CompilerInterface
    {
        if (!$this->hasSupportingActorTemplateFQCNCompiler()) {
            throw new \LogicException('SupportingActorTemplateFQCNCompiler is not set.');
        }

        return $this->SupportingActorTemplateFQCNCompiler;
    }

    protected function hasSupportingActorTemplateFQCNCompiler(): bool
    {
        return isset($this->SupportingActorTemplateFQCNCompiler);
    }

    protected function unsetSupportingActorTemplateFQCNCompiler(): self
    {
        if (!$this->hasSupportingActorTemplateFQCNCompiler()) {
            throw new \LogicException('SupportingActorTemplateFQCNCompiler is not set.');
        }
        unset($this->SupportingActorTemplateFQCNCompiler);

        return $this;
    }
}
