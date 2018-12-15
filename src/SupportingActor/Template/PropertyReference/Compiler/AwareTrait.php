<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\PropertyReference\Compiler;

use Rhift\Bradfab\SupportingActor\Template\PropertyReference\CompilerInterface;

trait AwareTrait
{
    protected $SupportingActorTemplatePropertyReferenceCompiler;

    public function setSupportingActorTemplatePropertyReferenceCompiler(CompilerInterface $Compiler): self
    {
        if ($this->hasSupportingActorTemplatePropertyReferenceCompiler()) {
            throw new \LogicException('SupportingActorTemplatePropertyReferenceCompiler is already set.');
        }
        $this->SupportingActorTemplatePropertyReferenceCompiler = $Compiler;

        return $this;
    }

    protected function getSupportingActorTemplatePropertyReferenceCompiler(): CompilerInterface
    {
        if (!$this->hasSupportingActorTemplatePropertyReferenceCompiler()) {
            throw new \LogicException('SupportingActorTemplatePropertyReferenceCompiler is not set.');
        }

        return $this->SupportingActorTemplatePropertyReferenceCompiler;
    }

    protected function hasSupportingActorTemplatePropertyReferenceCompiler(): bool
    {
        return isset($this->SupportingActorTemplatePropertyReferenceCompiler);
    }

    protected function unsetSupportingActorTemplatePropertyReferenceCompiler(): self
    {
        if (!$this->hasSupportingActorTemplatePropertyReferenceCompiler()) {
            throw new \LogicException('SupportingActorTemplatePropertyReferenceCompiler is not set.');
        }
        unset($this->SupportingActorTemplatePropertyReferenceCompiler);

        return $this;
    }
}
