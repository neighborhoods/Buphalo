<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\Compiler\Factory;

use Neighborhoods\Bradfab\SupportingActor\Template\Compiler\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateCompilerFactory;

    public function setSupportingActorTemplateCompilerFactory(FactoryInterface $CompilerFactory): self
    {
        if ($this->hasSupportingActorTemplateCompilerFactory()) {
            throw new \LogicException('SupportingActorTemplateCompilerFactory is already set.');
        }
        $this->SupportingActorTemplateCompilerFactory = $CompilerFactory;

        return $this;
    }

    protected function getSupportingActorTemplateCompilerFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorTemplateCompilerFactory()) {
            throw new \LogicException('SupportingActorTemplateCompilerFactory is not set.');
        }

        return $this->SupportingActorTemplateCompilerFactory;
    }

    protected function hasSupportingActorTemplateCompilerFactory(): bool
    {
        return isset($this->SupportingActorTemplateCompilerFactory);
    }

    protected function unsetSupportingActorTemplateCompilerFactory(): self
    {
        if (!$this->hasSupportingActorTemplateCompilerFactory()) {
            throw new \LogicException('SupportingActorTemplateCompilerFactory is not set.');
        }
        unset($this->SupportingActorTemplateCompilerFactory);

        return $this;
    }
}
