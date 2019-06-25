<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Tokenizer\Builder;

use LogicException;
use Neighborhoods\Bradfab\Actor\Template\Tokenizer\BuilderInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBradfabActorTemplateTokenizerBuilder;

    public function setActorTemplateTokenizerBuilder(BuilderInterface $actorTemplateTokenizerBuilder): self
    {
        if ($this->hasActorTemplateTokenizerBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template Tokenizer Builder is already set.');
        }
        $this->NeighborhoodsBradfabActorTemplateTokenizerBuilder = $actorTemplateTokenizerBuilder;

        return $this;
    }

    protected function getActorTemplateTokenizerBuilder(): BuilderInterface
    {
        if (!$this->hasActorTemplateTokenizerBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template Tokenizer Builder is not set.');
        }

        return $this->NeighborhoodsBradfabActorTemplateTokenizerBuilder;
    }

    protected function hasActorTemplateTokenizerBuilder(): bool
    {
        return isset($this->NeighborhoodsBradfabActorTemplateTokenizerBuilder);
    }

    protected function unsetActorTemplateTokenizerBuilder(): self
    {
        if (!$this->hasActorTemplateTokenizerBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template Tokenizer Builder is not set.');
        }
        unset($this->NeighborhoodsBradfabActorTemplateTokenizerBuilder);

        return $this;
    }
}
