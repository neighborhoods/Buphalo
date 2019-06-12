<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\Tokenizer;

use LogicException;
use Neighborhoods\Bradfab\SupportingActor\Template\TokenizerInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateTokenizer;

    public function setSupportingActorTemplateTokenizer(TokenizerInterface $Tokenizer): self
    {
        if ($this->hasSupportingActorTemplateTokenizer()) {
            throw new LogicException('SupportingActorTemplateTokenizer is already set.');
        }
        $this->SupportingActorTemplateTokenizer = $Tokenizer;

        return $this;
    }

    protected function getSupportingActorTemplateTokenizer(): TokenizerInterface
    {
        if (!$this->hasSupportingActorTemplateTokenizer()) {
            throw new LogicException('SupportingActorTemplateTokenizer is not set.');
        }

        return $this->SupportingActorTemplateTokenizer;
    }

    protected function hasSupportingActorTemplateTokenizer(): bool
    {
        return isset($this->SupportingActorTemplateTokenizer);
    }

    protected function unsetSupportingActorTemplateTokenizer(): self
    {
        if (!$this->hasSupportingActorTemplateTokenizer()) {
            throw new LogicException('SupportingActorTemplateTokenizer is not set.');
        }
        unset($this->SupportingActorTemplateTokenizer);

        return $this;
    }
}
