<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Compiler\Strategy;

use LogicException;
use Neighborhoods\Bradfab\Actor\Template\Compiler\StrategyInterface;

trait AwareTrait
{
    protected $ActorTemplateCompilerStrategy;

    public function setActorTemplateCompilerStrategy(StrategyInterface $Strategy): self
    {
        if ($this->hasActorTemplateCompilerStrategy()) {
            throw new LogicException('ActorTemplateCompilerStrategy is already set.');
        }
        $this->ActorTemplateCompilerStrategy = $Strategy;

        return $this;
    }

    protected function getActorTemplateCompilerStrategy(): StrategyInterface
    {
        if (!$this->hasActorTemplateCompilerStrategy()) {
            throw new LogicException('ActorTemplateCompilerStrategy is not set.');
        }

        return $this->ActorTemplateCompilerStrategy;
    }

    protected function hasActorTemplateCompilerStrategy(): bool
    {
        return isset($this->ActorTemplateCompilerStrategy);
    }

    protected function unsetActorTemplateCompilerStrategy(): self
    {
        if (!$this->hasActorTemplateCompilerStrategy()) {
            throw new LogicException('ActorTemplateCompilerStrategy is not set.');
        }
        unset($this->ActorTemplateCompilerStrategy);

        return $this;
    }
}
