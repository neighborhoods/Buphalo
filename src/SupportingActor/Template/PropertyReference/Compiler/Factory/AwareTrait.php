<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\PropertyReference\Compiler\Factory;

use Rhift\Bradfab\SupportingActor\Template\PropertyReference\Compiler\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorTemplatePropertyReferenceCompilerFactory;

    public function setSupportingActorTemplatePropertyReferenceCompilerFactory(FactoryInterface $CompilerFactory): self
    {
        if ($this->hasSupportingActorTemplatePropertyReferenceCompilerFactory()) {
            throw new \LogicException('SupportingActorTemplatePropertyReferenceCompilerFactory is already set.');
        }
        $this->SupportingActorTemplatePropertyReferenceCompilerFactory = $CompilerFactory;

        return $this;
    }

    protected function getSupportingActorTemplatePropertyReferenceCompilerFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorTemplatePropertyReferenceCompilerFactory()) {
            throw new \LogicException('SupportingActorTemplatePropertyReferenceCompilerFactory is not set.');
        }

        return $this->SupportingActorTemplatePropertyReferenceCompilerFactory;
    }

    protected function hasSupportingActorTemplatePropertyReferenceCompilerFactory(): bool
    {
        return isset($this->SupportingActorTemplatePropertyReferenceCompilerFactory);
    }

    protected function unsetSupportingActorTemplatePropertyReferenceCompilerFactory(): self
    {
        if (!$this->hasSupportingActorTemplatePropertyReferenceCompilerFactory()) {
            throw new \LogicException('SupportingActorTemplatePropertyReferenceCompilerFactory is not set.');
        }
        unset($this->SupportingActorTemplatePropertyReferenceCompilerFactory);

        return $this;
    }
}
