<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\Tokenizer\Builder;

use Rhift\Bradfab\SupportingActor\Template\Tokenizer\BuilderInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateTokenizerBuilder;

    public function setSupportingActorTemplateTokenizerBuilder(BuilderInterface $TokenizerBuilder): self
    {
        if ($this->hasSupportingActorTemplateTokenizerBuilder()) {
            throw new \LogicException('SupportingActorTemplateTokenizerBuilder is already set.');
        }
        $this->SupportingActorTemplateTokenizerBuilder = $TokenizerBuilder;

        return $this;
    }

    protected function getSupportingActorTemplateTokenizerBuilder(): BuilderInterface
    {
        if (!$this->hasSupportingActorTemplateTokenizerBuilder()) {
            throw new \LogicException('SupportingActorTemplateTokenizerBuilder is not set.');
        }

        return $this->SupportingActorTemplateTokenizerBuilder;
    }

    protected function hasSupportingActorTemplateTokenizerBuilder(): bool
    {
        return isset($this->SupportingActorTemplateTokenizerBuilder);
    }

    protected function unsetSupportingActorTemplateTokenizerBuilder(): self
    {
        if (!$this->hasSupportingActorTemplateTokenizerBuilder()) {
            throw new \LogicException('SupportingActorTemplateTokenizerBuilder is not set.');
        }
        unset($this->SupportingActorTemplateTokenizerBuilder);

        return $this;
    }
}
