<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\Actor\Template\Tokenizer\Builder;

use LogicException;
use Neighborhoods\Buphalo\Actor\Template\Tokenizer\BuilderInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBuphaloActorTemplateTokenizerBuilder;

    public function setActorTemplateTokenizerBuilder(BuilderInterface $actorTemplateTokenizerBuilder): self
    {
        if ($this->hasActorTemplateTokenizerBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template Tokenizer Builder is already set.');
        }
        $this->NeighborhoodsBuphaloActorTemplateTokenizerBuilder = $actorTemplateTokenizerBuilder;

        return $this;
    }

    protected function getActorTemplateTokenizerBuilder(): BuilderInterface
    {
        if (!$this->hasActorTemplateTokenizerBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template Tokenizer Builder is not set.');
        }

        return $this->NeighborhoodsBuphaloActorTemplateTokenizerBuilder;
    }

    protected function hasActorTemplateTokenizerBuilder(): bool
    {
        return isset($this->NeighborhoodsBuphaloActorTemplateTokenizerBuilder);
    }

    protected function unsetActorTemplateTokenizerBuilder(): self
    {
        if (!$this->hasActorTemplateTokenizerBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template Tokenizer Builder is not set.');
        }
        unset($this->NeighborhoodsBuphaloActorTemplateTokenizerBuilder);

        return $this;
    }
}
