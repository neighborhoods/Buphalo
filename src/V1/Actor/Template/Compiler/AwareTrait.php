<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Compiler;

use LogicException;
use Neighborhoods\Buphalo\V1\Actor\Template\CompilerInterface;

trait AwareTrait
{
    protected $ActorTemplateCompiler;

    public function setActorTemplateCompiler(CompilerInterface $Compiler): self
    {
        if ($this->hasActorTemplateCompiler()) {
            throw new LogicException('ActorTemplateCompiler is already set.');
        }
        $this->ActorTemplateCompiler = $Compiler;

        return $this;
    }

    protected function getActorTemplateCompiler(): CompilerInterface
    {
        if (!$this->hasActorTemplateCompiler()) {
            throw new LogicException('ActorTemplateCompiler is not set.');
        }

        return $this->ActorTemplateCompiler;
    }

    protected function hasActorTemplateCompiler(): bool
    {
        return isset($this->ActorTemplateCompiler);
    }

    protected function unsetActorTemplateCompiler(): self
    {
        if (!$this->hasActorTemplateCompiler()) {
            throw new LogicException('ActorTemplateCompiler is not set.');
        }
        unset($this->ActorTemplateCompiler);

        return $this;
    }
}
