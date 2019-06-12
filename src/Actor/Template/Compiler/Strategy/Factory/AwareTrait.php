<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Compiler\Strategy\Factory;

use LogicException;
use Neighborhoods\Bradfab\Actor\Template\Compiler\Strategy\FactoryInterface;

trait AwareTrait
{
    protected $ActorTemplateCompilerStrategyFactory;

    public function setActorTemplateCompilerStrategyFactory(FactoryInterface $StrategyFactory): self
    {
        if ($this->hasActorTemplateCompilerStrategyFactory()) {
            throw new LogicException('ActorTemplateCompilerStrategyFactory is already set.');
        }
        $this->ActorTemplateCompilerStrategyFactory = $StrategyFactory;

        return $this;
    }

    protected function getActorTemplateCompilerStrategyFactory(): FactoryInterface
    {
        if (!$this->hasActorTemplateCompilerStrategyFactory()) {
            throw new LogicException('ActorTemplateCompilerStrategyFactory is not set.');
        }

        return $this->ActorTemplateCompilerStrategyFactory;
    }

    protected function hasActorTemplateCompilerStrategyFactory(): bool
    {
        return isset($this->ActorTemplateCompilerStrategyFactory);
    }

    protected function unsetActorTemplateCompilerStrategyFactory(): self
    {
        if (!$this->hasActorTemplateCompilerStrategyFactory()) {
            throw new LogicException('ActorTemplateCompilerStrategyFactory is not set.');
        }
        unset($this->ActorTemplateCompilerStrategyFactory);

        return $this;
    }
}
