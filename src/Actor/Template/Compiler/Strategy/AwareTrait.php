<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Compiler\Strategy;

use LogicException;
use Neighborhoods\Bradfab\Actor\Template\Compiler\StrategyInterface;

trait AwareTrait
{
    protected $TargetActorTemplateCompilerStrategy;

    public function setTargetActorTemplateCompilerStrategy(StrategyInterface $Strategy): self
    {
        if ($this->hasTargetActorTemplateCompilerStrategy()) {
            throw new LogicException('TargetActorTemplateCompilerStrategy is already set.');
        }
        $this->TargetActorTemplateCompilerStrategy = $Strategy;

        return $this;
    }

    protected function getTargetActorTemplateCompilerStrategy(): StrategyInterface
    {
        if (!$this->hasTargetActorTemplateCompilerStrategy()) {
            throw new LogicException('TargetActorTemplateCompilerStrategy is not set.');
        }

        return $this->TargetActorTemplateCompilerStrategy;
    }

    protected function hasTargetActorTemplateCompilerStrategy(): bool
    {
        return isset($this->TargetActorTemplateCompilerStrategy);
    }

    protected function unsetTargetActorTemplateCompilerStrategy(): self
    {
        if (!$this->hasTargetActorTemplateCompilerStrategy()) {
            throw new LogicException('TargetActorTemplateCompilerStrategy is not set.');
        }
        unset($this->TargetActorTemplateCompilerStrategy);

        return $this;
    }
}
