<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Compiler\Factory;

use LogicException;
use Neighborhoods\Bradfab\Actor\Template\Compiler\FactoryInterface;

trait AwareTrait
{
    protected $TargetActorTemplateCompilerFactory;

    public function setTargetActorTemplateCompilerFactory(FactoryInterface $CompilerFactory): self
    {
        if ($this->hasTargetActorTemplateCompilerFactory()) {
            throw new LogicException('TargetActorTemplateCompilerFactory is already set.');
        }
        $this->TargetActorTemplateCompilerFactory = $CompilerFactory;

        return $this;
    }

    protected function getTargetActorTemplateCompilerFactory(): FactoryInterface
    {
        if (!$this->hasTargetActorTemplateCompilerFactory()) {
            throw new LogicException('TargetActorTemplateCompilerFactory is not set.');
        }

        return $this->TargetActorTemplateCompilerFactory;
    }

    protected function hasTargetActorTemplateCompilerFactory(): bool
    {
        return isset($this->TargetActorTemplateCompilerFactory);
    }

    protected function unsetTargetActorTemplateCompilerFactory(): self
    {
        if (!$this->hasTargetActorTemplateCompilerFactory()) {
            throw new LogicException('TargetActorTemplateCompilerFactory is not set.');
        }
        unset($this->TargetActorTemplateCompilerFactory);

        return $this;
    }
}
