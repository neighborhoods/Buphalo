<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template\Compiler;

use Neighborhoods\Bradfab\TargetActor\Template\CompilerInterface;

trait AwareTrait
{
    protected $TargetActorTemplateCompiler;

    public function setTargetActorTemplateCompiler(CompilerInterface $Compiler): self
    {
        if ($this->hasTargetActorTemplateCompiler()) {
            throw new \LogicException('TargetActorTemplateCompiler is already set.');
        }
        $this->TargetActorTemplateCompiler = $Compiler;

        return $this;
    }

    protected function getTargetActorTemplateCompiler(): CompilerInterface
    {
        if (!$this->hasTargetActorTemplateCompiler()) {
            throw new \LogicException('TargetActorTemplateCompiler is not set.');
        }

        return $this->TargetActorTemplateCompiler;
    }

    protected function hasTargetActorTemplateCompiler(): bool
    {
        return isset($this->TargetActorTemplateCompiler);
    }

    protected function unsetTargetActorTemplateCompiler(): self
    {
        if (!$this->hasTargetActorTemplateCompiler()) {
            throw new \LogicException('TargetActorTemplateCompiler is not set.');
        }
        unset($this->TargetActorTemplateCompiler);

        return $this;
    }
}
