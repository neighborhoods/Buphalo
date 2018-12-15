<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Property\Compiler;

use Rhift\Bradfab\SupportingActor\Template\Property\CompilerInterface;

trait AwareTrait
{
    protected $SupportingActorTemplatePropertyCompiler;

    public function setSupportingActorTemplatePropertyCompiler(CompilerInterface $Compiler): self
    {
        if ($this->hasSupportingActorTemplatePropertyCompiler()) {
            throw new \LogicException('SupportingActorTemplatePropertyCompiler is already set.');
        }
        $this->SupportingActorTemplatePropertyCompiler = $Compiler;

        return $this;
    }

    protected function getSupportingActorTemplatePropertyCompiler(): CompilerInterface
    {
        if (!$this->hasSupportingActorTemplatePropertyCompiler()) {
            throw new \LogicException('SupportingActorTemplatePropertyCompiler is not set.');
        }

        return $this->SupportingActorTemplatePropertyCompiler;
    }

    protected function hasSupportingActorTemplatePropertyCompiler(): bool
    {
        return isset($this->SupportingActorTemplatePropertyCompiler);
    }

    protected function unsetSupportingActorTemplatePropertyCompiler(): self
    {
        if (!$this->hasSupportingActorTemplatePropertyCompiler()) {
            throw new \LogicException('SupportingActorTemplatePropertyCompiler is not set.');
        }
        unset($this->SupportingActorTemplatePropertyCompiler);

        return $this;
    }
}
