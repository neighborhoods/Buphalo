<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Tokenizer;

use LogicException;
use Neighborhoods\Bradfab\Actor\Template\TokenizerInterface;

trait AwareTrait
{
    protected $TargetActorTemplateTokenizer;

    public function setTargetActorTemplateTokenizer(TokenizerInterface $Tokenizer): self
    {
        if ($this->hasTargetActorTemplateTokenizer()) {
            throw new LogicException('TargetActorTemplateTokenizer is already set.');
        }
        $this->TargetActorTemplateTokenizer = $Tokenizer;

        return $this;
    }

    protected function getTargetActorTemplateTokenizer(): TokenizerInterface
    {
        if (!$this->hasTargetActorTemplateTokenizer()) {
            throw new LogicException('TargetActorTemplateTokenizer is not set.');
        }

        return $this->TargetActorTemplateTokenizer;
    }

    protected function hasTargetActorTemplateTokenizer(): bool
    {
        return isset($this->TargetActorTemplateTokenizer);
    }

    protected function unsetTargetActorTemplateTokenizer(): self
    {
        if (!$this->hasTargetActorTemplateTokenizer()) {
            throw new LogicException('TargetActorTemplateTokenizer is not set.');
        }
        unset($this->TargetActorTemplateTokenizer);

        return $this;
    }
}
