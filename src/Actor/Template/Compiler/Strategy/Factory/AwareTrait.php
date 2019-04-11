<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Compiler\Strategy\Factory;

use LogicException;
use Neighborhoods\Bradfab\Actor\Template\Compiler\Strategy\FactoryInterface;

trait AwareTrait
{
    protected $TargetActorTemplateCompilerStrategyFactory;

    public function setTargetActorTemplateCompilerStrategyFactory(FactoryInterface $StrategyFactory): self
    {
        if ($this->hasTargetActorTemplateCompilerStrategyFactory()) {
            throw new LogicException('TargetActorTemplateCompilerStrategyFactory is already set.');
        }
        $this->TargetActorTemplateCompilerStrategyFactory = $StrategyFactory;

        return $this;
    }

    protected function getTargetActorTemplateCompilerStrategyFactory(): FactoryInterface
    {
        if (!$this->hasTargetActorTemplateCompilerStrategyFactory()) {
            throw new LogicException('TargetActorTemplateCompilerStrategyFactory is not set.');
        }

        return $this->TargetActorTemplateCompilerStrategyFactory;
    }

    protected function hasTargetActorTemplateCompilerStrategyFactory(): bool
    {
        return isset($this->TargetActorTemplateCompilerStrategyFactory);
    }

    protected function unsetTargetActorTemplateCompilerStrategyFactory(): self
    {
        if (!$this->hasTargetActorTemplateCompilerStrategyFactory()) {
            throw new LogicException('TargetActorTemplateCompilerStrategyFactory is not set.');
        }
        unset($this->TargetActorTemplateCompilerStrategyFactory);

        return $this;
    }
}
