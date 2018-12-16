<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Compiler\Strategy\Builder;

use Rhift\Bradfab\SupportingActor\Template\Compiler\Strategy\BuilderInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateCompilerStrategyBuilder;

    public function setSupportingActorTemplateCompilerStrategyBuilder(BuilderInterface $StrategyBuilder): self
    {
        if ($this->hasSupportingActorTemplateCompilerStrategyBuilder()) {
            throw new \LogicException('SupportingActorTemplateCompilerStrategyBuilder is already set.');
        }
        $this->SupportingActorTemplateCompilerStrategyBuilder = $StrategyBuilder;

        return $this;
    }

    protected function getSupportingActorTemplateCompilerStrategyBuilder(): BuilderInterface
    {
        if (!$this->hasSupportingActorTemplateCompilerStrategyBuilder()) {
            throw new \LogicException('SupportingActorTemplateCompilerStrategyBuilder is not set.');
        }

        return $this->SupportingActorTemplateCompilerStrategyBuilder;
    }

    protected function hasSupportingActorTemplateCompilerStrategyBuilder(): bool
    {
        return isset($this->SupportingActorTemplateCompilerStrategyBuilder);
    }

    protected function unsetSupportingActorTemplateCompilerStrategyBuilder(): self
    {
        if (!$this->hasSupportingActorTemplateCompilerStrategyBuilder()) {
            throw new \LogicException('SupportingActorTemplateCompilerStrategyBuilder is not set.');
        }
        unset($this->SupportingActorTemplateCompilerStrategyBuilder);

        return $this;
    }
}
