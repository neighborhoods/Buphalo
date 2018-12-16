<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Compiler\Strategy\Factory;

use Rhift\Bradfab\SupportingActor\Template\Compiler\Strategy\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateCompilerStrategyFactory;

    public function setSupportingActorTemplateCompilerStrategyFactory(FactoryInterface $StrategyFactory): self
    {
        if ($this->hasSupportingActorTemplateCompilerStrategyFactory()) {
            throw new \LogicException('SupportingActorTemplateCompilerStrategyFactory is already set.');
        }
        $this->SupportingActorTemplateCompilerStrategyFactory = $StrategyFactory;

        return $this;
    }

    protected function getSupportingActorTemplateCompilerStrategyFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorTemplateCompilerStrategyFactory()) {
            throw new \LogicException('SupportingActorTemplateCompilerStrategyFactory is not set.');
        }

        return $this->SupportingActorTemplateCompilerStrategyFactory;
    }

    protected function hasSupportingActorTemplateCompilerStrategyFactory(): bool
    {
        return isset($this->SupportingActorTemplateCompilerStrategyFactory);
    }

    protected function unsetSupportingActorTemplateCompilerStrategyFactory(): self
    {
        if (!$this->hasSupportingActorTemplateCompilerStrategyFactory()) {
            throw new \LogicException('SupportingActorTemplateCompilerStrategyFactory is not set.');
        }
        unset($this->SupportingActorTemplateCompilerStrategyFactory);

        return $this;
    }
}
