<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\Tokenizer\Factory;

use Neighborhoods\Bradfab\SupportingActor\Template\Tokenizer\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateTokenizerFactory;

    public function setSupportingActorTemplateTokenizerFactory(FactoryInterface $TokenizerFactory): self
    {
        if ($this->hasSupportingActorTemplateTokenizerFactory()) {
            throw new \LogicException('SupportingActorTemplateTokenizerFactory is already set.');
        }
        $this->SupportingActorTemplateTokenizerFactory = $TokenizerFactory;

        return $this;
    }

    protected function getSupportingActorTemplateTokenizerFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorTemplateTokenizerFactory()) {
            throw new \LogicException('SupportingActorTemplateTokenizerFactory is not set.');
        }

        return $this->SupportingActorTemplateTokenizerFactory;
    }

    protected function hasSupportingActorTemplateTokenizerFactory(): bool
    {
        return isset($this->SupportingActorTemplateTokenizerFactory);
    }

    protected function unsetSupportingActorTemplateTokenizerFactory(): self
    {
        if (!$this->hasSupportingActorTemplateTokenizerFactory()) {
            throw new \LogicException('SupportingActorTemplateTokenizerFactory is not set.');
        }
        unset($this->SupportingActorTemplateTokenizerFactory);

        return $this;
    }
}
