<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Compiler\Strategy;

use Rhift\Bradfab\SupportingActor\Template\Compiler\StrategyInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateCompilerStrategy;

    public function setSupportingActorTemplateCompilerStrategy(StrategyInterface $Strategy): self
    {
        if ($this->hasSupportingActorTemplateCompilerStrategy()) {
            throw new \LogicException('SupportingActorTemplateCompilerStrategy is already set.');
        }
        $this->SupportingActorTemplateCompilerStrategy = $Strategy;

        return $this;
    }

    protected function getSupportingActorTemplateCompilerStrategy(): StrategyInterface
    {
        if (!$this->hasSupportingActorTemplateCompilerStrategy()) {
            throw new \LogicException('SupportingActorTemplateCompilerStrategy is not set.');
        }

        return $this->SupportingActorTemplateCompilerStrategy;
    }

    protected function hasSupportingActorTemplateCompilerStrategy(): bool
    {
        return isset($this->SupportingActorTemplateCompilerStrategy);
    }

    protected function unsetSupportingActorTemplateCompilerStrategy(): self
    {
        if (!$this->hasSupportingActorTemplateCompilerStrategy()) {
            throw new \LogicException('SupportingActorTemplateCompilerStrategy is not set.');
        }
        unset($this->SupportingActorTemplateCompilerStrategy);

        return $this;
    }
}
