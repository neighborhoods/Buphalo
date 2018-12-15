<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\PropertyReference\Compiler\Builder\Factory;

use Rhift\Bradfab\SupportingActor\Template\PropertyReference\Compiler\Builder\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorTemplatePropertyReferenceCompilerBuilderFactory;

    public function setSupportingActorTemplatePropertyReferenceCompilerBuilderFactory(FactoryInterface $CompilerBuilderFactory): self
    {
        if ($this->hasSupportingActorTemplatePropertyReferenceCompilerBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplatePropertyReferenceCompilerBuilderFactory is already set.');
        }
        $this->SupportingActorTemplatePropertyReferenceCompilerBuilderFactory = $CompilerBuilderFactory;

        return $this;
    }

    protected function getSupportingActorTemplatePropertyReferenceCompilerBuilderFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorTemplatePropertyReferenceCompilerBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplatePropertyReferenceCompilerBuilderFactory is not set.');
        }

        return $this->SupportingActorTemplatePropertyReferenceCompilerBuilderFactory;
    }

    protected function hasSupportingActorTemplatePropertyReferenceCompilerBuilderFactory(): bool
    {
        return isset($this->SupportingActorTemplatePropertyReferenceCompilerBuilderFactory);
    }

    protected function unsetSupportingActorTemplatePropertyReferenceCompilerBuilderFactory(): self
    {
        if (!$this->hasSupportingActorTemplatePropertyReferenceCompilerBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplatePropertyReferenceCompilerBuilderFactory is not set.');
        }
        unset($this->SupportingActorTemplatePropertyReferenceCompilerBuilderFactory);

        return $this;
    }
}
