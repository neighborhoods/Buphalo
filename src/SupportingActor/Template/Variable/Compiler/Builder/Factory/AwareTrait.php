<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Variable\Compiler\Builder\Factory;

use Rhift\Bradfab\SupportingActor\Template\Variable\Compiler\Builder\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateVariableCompilerBuilderFactory;

    public function setSupportingActorTemplateVariableCompilerBuilderFactory(FactoryInterface $CompilerBuilderFactory): self
    {
        if ($this->hasSupportingActorTemplateVariableCompilerBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplateVariableCompilerBuilderFactory is already set.');
        }
        $this->SupportingActorTemplateVariableCompilerBuilderFactory = $CompilerBuilderFactory;

        return $this;
    }

    protected function getSupportingActorTemplateVariableCompilerBuilderFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorTemplateVariableCompilerBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplateVariableCompilerBuilderFactory is not set.');
        }

        return $this->SupportingActorTemplateVariableCompilerBuilderFactory;
    }

    protected function hasSupportingActorTemplateVariableCompilerBuilderFactory(): bool
    {
        return isset($this->SupportingActorTemplateVariableCompilerBuilderFactory);
    }

    protected function unsetSupportingActorTemplateVariableCompilerBuilderFactory(): self
    {
        if (!$this->hasSupportingActorTemplateVariableCompilerBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplateVariableCompilerBuilderFactory is not set.');
        }
        unset($this->SupportingActorTemplateVariableCompilerBuilderFactory);

        return $this;
    }
}
