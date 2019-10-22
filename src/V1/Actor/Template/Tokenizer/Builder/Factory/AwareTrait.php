<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Builder\Factory;

use LogicException;
use Neighborhoods\Buphalo\V1\Actor\Template\Tokenizer\Builder\FactoryInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBuphaloActorTemplateTokenizerBuilderFactory;

    public function setActorTemplateTokenizerBuilderFactory(FactoryInterface $actorTemplateTokenizerBuilderFactory
    ): self {
        if ($this->hasActorTemplateTokenizerBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template Tokenizer Builder Factory is already set.');
        }
        $this->NeighborhoodsBuphaloActorTemplateTokenizerBuilderFactory = $actorTemplateTokenizerBuilderFactory;

        return $this;
    }

    protected function getActorTemplateTokenizerBuilderFactory(): FactoryInterface
    {
        if (!$this->hasActorTemplateTokenizerBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template Tokenizer Builder Factory is not set.');
        }

        return $this->NeighborhoodsBuphaloActorTemplateTokenizerBuilderFactory;
    }

    protected function hasActorTemplateTokenizerBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBuphaloActorTemplateTokenizerBuilderFactory);
    }

    protected function unsetActorTemplateTokenizerBuilderFactory(): self
    {
        if (!$this->hasActorTemplateTokenizerBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template Tokenizer Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBuphaloActorTemplateTokenizerBuilderFactory);

        return $this;
    }
}
