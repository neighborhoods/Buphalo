<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Compiler;

use Rhift\Bradfab\SupportingActor\Template\CompilerInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateCompiler;

    public function setSupportingActorTemplateCompiler(CompilerInterface $Compiler): self
    {
        if ($this->hasSupportingActorTemplateCompiler()) {
            throw new \LogicException('SupportingActorTemplateCompiler is already set.');
        }
        $this->SupportingActorTemplateCompiler = $Compiler;

        return $this;
    }

    protected function getSupportingActorTemplateCompiler(): CompilerInterface
    {
        if (!$this->hasSupportingActorTemplateCompiler()) {
            throw new \LogicException('SupportingActorTemplateCompiler is not set.');
        }

        return $this->SupportingActorTemplateCompiler;
    }

    protected function hasSupportingActorTemplateCompiler(): bool
    {
        return isset($this->SupportingActorTemplateCompiler);
    }

    protected function unsetSupportingActorTemplateCompiler(): self
    {
        if (!$this->hasSupportingActorTemplateCompiler()) {
            throw new \LogicException('SupportingActorTemplateCompiler is not set.');
        }
        unset($this->SupportingActorTemplateCompiler);

        return $this;
    }
}
