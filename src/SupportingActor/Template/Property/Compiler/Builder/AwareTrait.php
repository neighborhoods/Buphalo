<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Property\Compiler\Builder;

use Rhift\Bradfab\SupportingActor\Template\Property\Compiler\BuilderInterface;

trait AwareTrait
{
    protected $SupportingActorTemplatePropertyCompilerBuilder;

    public function setSupportingActorTemplatePropertyCompilerBuilder(BuilderInterface $CompilerBuilder): self
    {
        if ($this->hasSupportingActorTemplatePropertyCompilerBuilder()) {
            throw new \LogicException('SupportingActorTemplatePropertyCompilerBuilder is already set.');
        }
        $this->SupportingActorTemplatePropertyCompilerBuilder = $CompilerBuilder;

        return $this;
    }

    protected function getSupportingActorTemplatePropertyCompilerBuilder(): BuilderInterface
    {
        if (!$this->hasSupportingActorTemplatePropertyCompilerBuilder()) {
            throw new \LogicException('SupportingActorTemplatePropertyCompilerBuilder is not set.');
        }

        return $this->SupportingActorTemplatePropertyCompilerBuilder;
    }

    protected function hasSupportingActorTemplatePropertyCompilerBuilder(): bool
    {
        return isset($this->SupportingActorTemplatePropertyCompilerBuilder);
    }

    protected function unsetSupportingActorTemplatePropertyCompilerBuilder(): self
    {
        if (!$this->hasSupportingActorTemplatePropertyCompilerBuilder()) {
            throw new \LogicException('SupportingActorTemplatePropertyCompilerBuilder is not set.');
        }
        unset($this->SupportingActorTemplatePropertyCompilerBuilder);

        return $this;
    }
}
