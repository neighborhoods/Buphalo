<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\PropertyReference\Compiler\Builder;

use Rhift\Bradfab\SupportingActor\Template\PropertyReference\Compiler\BuilderInterface;

trait AwareTrait
{
    protected $SupportingActorTemplatePropertyReferenceCompilerBuilder;

    public function setSupportingActorTemplatePropertyReferenceCompilerBuilder(BuilderInterface $CompilerBuilder): self
    {
        if ($this->hasSupportingActorTemplatePropertyReferenceCompilerBuilder()) {
            throw new \LogicException('SupportingActorTemplatePropertyReferenceCompilerBuilder is already set.');
        }
        $this->SupportingActorTemplatePropertyReferenceCompilerBuilder = $CompilerBuilder;

        return $this;
    }

    protected function getSupportingActorTemplatePropertyReferenceCompilerBuilder(): BuilderInterface
    {
        if (!$this->hasSupportingActorTemplatePropertyReferenceCompilerBuilder()) {
            throw new \LogicException('SupportingActorTemplatePropertyReferenceCompilerBuilder is not set.');
        }

        return $this->SupportingActorTemplatePropertyReferenceCompilerBuilder;
    }

    protected function hasSupportingActorTemplatePropertyReferenceCompilerBuilder(): bool
    {
        return isset($this->SupportingActorTemplatePropertyReferenceCompilerBuilder);
    }

    protected function unsetSupportingActorTemplatePropertyReferenceCompilerBuilder(): self
    {
        if (!$this->hasSupportingActorTemplatePropertyReferenceCompilerBuilder()) {
            throw new \LogicException('SupportingActorTemplatePropertyReferenceCompilerBuilder is not set.');
        }
        unset($this->SupportingActorTemplatePropertyReferenceCompilerBuilder);

        return $this;
    }
}
