<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Tokenizer\Builder\Factory;

use Rhift\Bradfab\SupportingActor\Template\Tokenizer\Builder\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateTokenizerBuilderFactory;

    public function setSupportingActorTemplateTokenizerBuilderFactory(FactoryInterface $TokenizerBuilderFactory): self
    {
        if ($this->hasSupportingActorTemplateTokenizerBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplateTokenizerBuilderFactory is already set.');
        }
        $this->SupportingActorTemplateTokenizerBuilderFactory = $TokenizerBuilderFactory;

        return $this;
    }

    protected function getSupportingActorTemplateTokenizerBuilderFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorTemplateTokenizerBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplateTokenizerBuilderFactory is not set.');
        }

        return $this->SupportingActorTemplateTokenizerBuilderFactory;
    }

    protected function hasSupportingActorTemplateTokenizerBuilderFactory(): bool
    {
        return isset($this->SupportingActorTemplateTokenizerBuilderFactory);
    }

    protected function unsetSupportingActorTemplateTokenizerBuilderFactory(): self
    {
        if (!$this->hasSupportingActorTemplateTokenizerBuilderFactory()) {
            throw new \LogicException('SupportingActorTemplateTokenizerBuilderFactory is not set.');
        }
        unset($this->SupportingActorTemplateTokenizerBuilderFactory);

        return $this;
    }
}
