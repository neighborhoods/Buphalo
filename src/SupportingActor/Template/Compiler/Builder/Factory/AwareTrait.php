<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Compiler\Builder\Factory;

use Rhift\Bradfab\SupportingActor\Template\Compiler\Builder\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateCompilerBuilderFactory;

    public function setSupportingActorTemplateCompilerBuilderFactory(FactoryInterface $CompilerBuilderFactory): self
    {
        if ($this->hasSupportingActorTemplateCompilerBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplateCompilerBuilderFactory is already set.');
        }
        $this->SupportingActorTemplateCompilerBuilderFactory = $CompilerBuilderFactory;

        return $this;
    }

    protected function getSupportingActorTemplateCompilerBuilderFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorTemplateCompilerBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplateCompilerBuilderFactory is not set.');
        }

        return $this->SupportingActorTemplateCompilerBuilderFactory;
    }

    protected function hasSupportingActorTemplateCompilerBuilderFactory(): bool
    {
        return isset($this->SupportingActorTemplateCompilerBuilderFactory);
    }

    protected function unsetSupportingActorTemplateCompilerBuilderFactory(): self
    {
        if (!$this->hasSupportingActorTemplateCompilerBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplateCompilerBuilderFactory is not set.');
        }
        unset($this->SupportingActorTemplateCompilerBuilderFactory);

        return $this;
    }
}
