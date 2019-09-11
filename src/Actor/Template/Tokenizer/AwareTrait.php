<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template\Tokenizer;

use LogicException;
use Neighborhoods\Buphalo\Actor\Template\TokenizerInterface;

trait AwareTrait
{
    protected $ActorTemplateTokenizer;

    public function setActorTemplateTokenizer(TokenizerInterface $Tokenizer): self
    {
        if ($this->hasActorTemplateTokenizer()) {
            throw new LogicException('ActorTemplateTokenizer is already set.');
        }
        $this->ActorTemplateTokenizer = $Tokenizer;

        return $this;
    }

    protected function getActorTemplateTokenizer(): TokenizerInterface
    {
        if (!$this->hasActorTemplateTokenizer()) {
            throw new LogicException('ActorTemplateTokenizer is not set.');
        }

        return $this->ActorTemplateTokenizer;
    }

    protected function hasActorTemplateTokenizer(): bool
    {
        return isset($this->ActorTemplateTokenizer);
    }

    protected function unsetActorTemplateTokenizer(): self
    {
        if (!$this->hasActorTemplateTokenizer()) {
            throw new LogicException('ActorTemplateTokenizer is not set.');
        }
        unset($this->ActorTemplateTokenizer);

        return $this;
    }
}
