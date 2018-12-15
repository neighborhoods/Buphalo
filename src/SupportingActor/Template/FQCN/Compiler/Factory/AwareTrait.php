<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\FQCN\Compiler\Factory;

use Rhift\Bradfab\SupportingActor\Template\FQCN\Compiler\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateFQCNCompilerFactory;

    public function setSupportingActorTemplateFQCNCompilerFactory(FactoryInterface $CompilerFactory): self
    {
        if ($this->hasSupportingActorTemplateFQCNCompilerFactory()) {
            throw new \LogicException('SupportingActorTemplateFQCNCompilerFactory is already set.');
        }
        $this->SupportingActorTemplateFQCNCompilerFactory = $CompilerFactory;

        return $this;
    }

    protected function getSupportingActorTemplateFQCNCompilerFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorTemplateFQCNCompilerFactory()) {
            throw new \LogicException('SupportingActorTemplateFQCNCompilerFactory is not set.');
        }

        return $this->SupportingActorTemplateFQCNCompilerFactory;
    }

    protected function hasSupportingActorTemplateFQCNCompilerFactory(): bool
    {
        return isset($this->SupportingActorTemplateFQCNCompilerFactory);
    }

    protected function unsetSupportingActorTemplateFQCNCompilerFactory(): self
    {
        if (!$this->hasSupportingActorTemplateFQCNCompilerFactory()) {
            throw new \LogicException('SupportingActorTemplateFQCNCompilerFactory is not set.');
        }
        unset($this->SupportingActorTemplateFQCNCompilerFactory);

        return $this;
    }
}
