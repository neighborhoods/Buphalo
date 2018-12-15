<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Variable\Compiler\Factory;

use Rhift\Bradfab\SupportingActor\Template\Variable\Compiler\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateVariableCompilerFactory;

    public function setSupportingActorTemplateVariableCompilerFactory(FactoryInterface $CompilerFactory): self
    {
        if ($this->hasSupportingActorTemplateVariableCompilerFactory()) {
            throw new \LogicException('SupportingActorTemplateVariableCompilerFactory is already set.');
        }
        $this->SupportingActorTemplateVariableCompilerFactory = $CompilerFactory;

        return $this;
    }

    protected function getSupportingActorTemplateVariableCompilerFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorTemplateVariableCompilerFactory()) {
            throw new \LogicException('SupportingActorTemplateVariableCompilerFactory is not set.');
        }

        return $this->SupportingActorTemplateVariableCompilerFactory;
    }

    protected function hasSupportingActorTemplateVariableCompilerFactory(): bool
    {
        return isset($this->SupportingActorTemplateVariableCompilerFactory);
    }

    protected function unsetSupportingActorTemplateVariableCompilerFactory(): self
    {
        if (!$this->hasSupportingActorTemplateVariableCompilerFactory()) {
            throw new \LogicException('SupportingActorTemplateVariableCompilerFactory is not set.');
        }
        unset($this->SupportingActorTemplateVariableCompilerFactory);

        return $this;
    }
}
