<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Compiler\Factory;

use LogicException;
use Neighborhoods\Buphalo\V1\Actor\Template\Compiler\FactoryInterface;

trait AwareTrait
{
    protected $ActorTemplateCompilerFactory;

    public function setActorTemplateCompilerFactory(FactoryInterface $CompilerFactory): self
    {
        if ($this->hasActorTemplateCompilerFactory()) {
            throw new LogicException('ActorTemplateCompilerFactory is already set.');
        }
        $this->ActorTemplateCompilerFactory = $CompilerFactory;

        return $this;
    }

    protected function getActorTemplateCompilerFactory(): FactoryInterface
    {
        if (!$this->hasActorTemplateCompilerFactory()) {
            throw new LogicException('ActorTemplateCompilerFactory is not set.');
        }

        return $this->ActorTemplateCompilerFactory;
    }

    protected function hasActorTemplateCompilerFactory(): bool
    {
        return isset($this->ActorTemplateCompilerFactory);
    }

    protected function unsetActorTemplateCompilerFactory(): self
    {
        if (!$this->hasActorTemplateCompilerFactory()) {
            throw new LogicException('ActorTemplateCompilerFactory is not set.');
        }
        unset($this->ActorTemplateCompilerFactory);

        return $this;
    }
}
