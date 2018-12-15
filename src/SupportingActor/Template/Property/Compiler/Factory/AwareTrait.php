<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Property\Compiler\Factory;

use Rhift\Bradfab\SupportingActor\Template\Property\Compiler\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorTemplatePropertyCompilerFactory;

    public function setSupportingActorTemplatePropertyCompilerFactory(FactoryInterface $CompilerFactory): self
    {
        if ($this->hasSupportingActorTemplatePropertyCompilerFactory()) {
            throw new \LogicException('SupportingActorTemplatePropertyCompilerFactory is already set.');
        }
        $this->SupportingActorTemplatePropertyCompilerFactory = $CompilerFactory;

        return $this;
    }

    protected function getSupportingActorTemplatePropertyCompilerFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorTemplatePropertyCompilerFactory()) {
            throw new \LogicException('SupportingActorTemplatePropertyCompilerFactory is not set.');
        }

        return $this->SupportingActorTemplatePropertyCompilerFactory;
    }

    protected function hasSupportingActorTemplatePropertyCompilerFactory(): bool
    {
        return isset($this->SupportingActorTemplatePropertyCompilerFactory);
    }

    protected function unsetSupportingActorTemplatePropertyCompilerFactory(): self
    {
        if (!$this->hasSupportingActorTemplatePropertyCompilerFactory()) {
            throw new \LogicException('SupportingActorTemplatePropertyCompilerFactory is not set.');
        }
        unset($this->SupportingActorTemplatePropertyCompilerFactory);

        return $this;
    }
}
