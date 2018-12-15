<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\FQCN\Compiler\Builder;

use Rhift\Bradfab\SupportingActor\Template\FQCN\Compiler\BuilderInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateFQCNCompilerBuilder;

    public function setSupportingActorTemplateFQCNCompilerBuilder(BuilderInterface $CompilerBuilder): self
    {
        if ($this->hasSupportingActorTemplateFQCNCompilerBuilder()) {
            throw new \LogicException('SupportingActorTemplateFQCNCompilerBuilder is already set.');
        }
        $this->SupportingActorTemplateFQCNCompilerBuilder = $CompilerBuilder;

        return $this;
    }

    protected function getSupportingActorTemplateFQCNCompilerBuilder(): BuilderInterface
    {
        if (!$this->hasSupportingActorTemplateFQCNCompilerBuilder()) {
            throw new \LogicException('SupportingActorTemplateFQCNCompilerBuilder is not set.');
        }

        return $this->SupportingActorTemplateFQCNCompilerBuilder;
    }

    protected function hasSupportingActorTemplateFQCNCompilerBuilder(): bool
    {
        return isset($this->SupportingActorTemplateFQCNCompilerBuilder);
    }

    protected function unsetSupportingActorTemplateFQCNCompilerBuilder(): self
    {
        if (!$this->hasSupportingActorTemplateFQCNCompilerBuilder()) {
            throw new \LogicException('SupportingActorTemplateFQCNCompilerBuilder is not set.');
        }
        unset($this->SupportingActorTemplateFQCNCompilerBuilder);

        return $this;
    }
}
