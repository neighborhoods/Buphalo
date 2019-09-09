<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\Tokenizer\Builder\Factory;

use LogicException;
use Neighborhoods\Bradfab\Actor\Template\Tokenizer\Builder\FactoryInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBradfabActorTemplateTokenizerBuilderFactory;

    public function setActorTemplateTokenizerBuilderFactory(FactoryInterface $actorTemplateTokenizerBuilderFactory
    ): self {
        if ($this->hasActorTemplateTokenizerBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template Tokenizer Builder Factory is already set.');
        }
        $this->NeighborhoodsBradfabActorTemplateTokenizerBuilderFactory = $actorTemplateTokenizerBuilderFactory;

        return $this;
    }

    protected function getActorTemplateTokenizerBuilderFactory(): FactoryInterface
    {
        if (!$this->hasActorTemplateTokenizerBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template Tokenizer Builder Factory is not set.');
        }

        return $this->NeighborhoodsBradfabActorTemplateTokenizerBuilderFactory;
    }

    protected function hasActorTemplateTokenizerBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBradfabActorTemplateTokenizerBuilderFactory);
    }

    protected function unsetActorTemplateTokenizerBuilderFactory(): self
    {
        if (!$this->hasActorTemplateTokenizerBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template Tokenizer Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBradfabActorTemplateTokenizerBuilderFactory);

        return $this;
    }
}
