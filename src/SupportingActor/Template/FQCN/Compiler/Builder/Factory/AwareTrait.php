<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\FQCN\Compiler\Builder\Factory;

use Rhift\Bradfab\SupportingActor\Template\FQCN\Compiler\Builder\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateFQCNCompilerBuilderFactory;

    public function setSupportingActorTemplateFQCNCompilerBuilderFactory(FactoryInterface $CompilerBuilderFactory): self
    {
        if ($this->hasSupportingActorTemplateFQCNCompilerBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplateFQCNCompilerBuilderFactory is already set.');
        }
        $this->SupportingActorTemplateFQCNCompilerBuilderFactory = $CompilerBuilderFactory;

        return $this;
    }

    protected function getSupportingActorTemplateFQCNCompilerBuilderFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorTemplateFQCNCompilerBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplateFQCNCompilerBuilderFactory is not set.');
        }

        return $this->SupportingActorTemplateFQCNCompilerBuilderFactory;
    }

    protected function hasSupportingActorTemplateFQCNCompilerBuilderFactory(): bool
    {
        return isset($this->SupportingActorTemplateFQCNCompilerBuilderFactory);
    }

    protected function unsetSupportingActorTemplateFQCNCompilerBuilderFactory(): self
    {
        if (!$this->hasSupportingActorTemplateFQCNCompilerBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplateFQCNCompilerBuilderFactory is not set.');
        }
        unset($this->SupportingActorTemplateFQCNCompilerBuilderFactory);

        return $this;
    }
}
