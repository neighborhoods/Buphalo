<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Property\Compiler\Builder\Factory;

use Rhift\Bradfab\SupportingActor\Template\Property\Compiler\Builder\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorTemplatePropertyCompilerBuilderFactory;

    public function setSupportingActorTemplatePropertyCompilerBuilderFactory(FactoryInterface $CompilerBuilderFactory): self
    {
        if ($this->hasSupportingActorTemplatePropertyCompilerBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplatePropertyCompilerBuilderFactory is already set.');
        }
        $this->SupportingActorTemplatePropertyCompilerBuilderFactory = $CompilerBuilderFactory;

        return $this;
    }

    protected function getSupportingActorTemplatePropertyCompilerBuilderFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorTemplatePropertyCompilerBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplatePropertyCompilerBuilderFactory is not set.');
        }

        return $this->SupportingActorTemplatePropertyCompilerBuilderFactory;
    }

    protected function hasSupportingActorTemplatePropertyCompilerBuilderFactory(): bool
    {
        return isset($this->SupportingActorTemplatePropertyCompilerBuilderFactory);
    }

    protected function unsetSupportingActorTemplatePropertyCompilerBuilderFactory(): self
    {
        if (!$this->hasSupportingActorTemplatePropertyCompilerBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplatePropertyCompilerBuilderFactory is not set.');
        }
        unset($this->SupportingActorTemplatePropertyCompilerBuilderFactory);

        return $this;
    }
}
