<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Compiler\Strategy\Builder\Factory;

use Rhift\Bradfab\SupportingActor\Template\Compiler\Strategy\Builder\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateCompilerStrategyBuilderFactory;

    public function setSupportingActorTemplateCompilerStrategyBuilderFactory(FactoryInterface $StrategyBuilderFactory): self
    {
        if ($this->hasSupportingActorTemplateCompilerStrategyBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplateCompilerStrategyBuilderFactory is already set.');
        }
        $this->SupportingActorTemplateCompilerStrategyBuilderFactory = $StrategyBuilderFactory;

        return $this;
    }

    protected function getSupportingActorTemplateCompilerStrategyBuilderFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorTemplateCompilerStrategyBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplateCompilerStrategyBuilderFactory is not set.');
        }

        return $this->SupportingActorTemplateCompilerStrategyBuilderFactory;
    }

    protected function hasSupportingActorTemplateCompilerStrategyBuilderFactory(): bool
    {
        return isset($this->SupportingActorTemplateCompilerStrategyBuilderFactory);
    }

    protected function unsetSupportingActorTemplateCompilerStrategyBuilderFactory(): self
    {
        if (!$this->hasSupportingActorTemplateCompilerStrategyBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplateCompilerStrategyBuilderFactory is not set.');
        }
        unset($this->SupportingActorTemplateCompilerStrategyBuilderFactory);

        return $this;
    }
}
