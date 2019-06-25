<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\AnnotationTokenizer\Builder\Factory;

use LogicException;
use Neighborhoods\Bradfab\Actor\Template\AnnotationTokenizer\Builder\FactoryInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBradfabActorTemplateAnnotationTokenizerBuilderFactory;

    public function setActorTemplateAnnotationTokenizerBuilderFactory(
        FactoryInterface $actorTemplateAnnotationTokenizerBuilderFactory
    ): self {
        if ($this->hasActorTemplateAnnotationTokenizerBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template AnnotationTokenizer Builder Factory is already set.');
        }
        $this->NeighborhoodsBradfabActorTemplateAnnotationTokenizerBuilderFactory = $actorTemplateAnnotationTokenizerBuilderFactory;

        return $this;
    }

    protected function getActorTemplateAnnotationTokenizerBuilderFactory(): FactoryInterface
    {
        if (!$this->hasActorTemplateAnnotationTokenizerBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template AnnotationTokenizer Builder Factory is not set.');
        }

        return $this->NeighborhoodsBradfabActorTemplateAnnotationTokenizerBuilderFactory;
    }

    protected function hasActorTemplateAnnotationTokenizerBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBradfabActorTemplateAnnotationTokenizerBuilderFactory);
    }

    protected function unsetActorTemplateAnnotationTokenizerBuilderFactory(): self
    {
        if (!$this->hasActorTemplateAnnotationTokenizerBuilderFactory()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template AnnotationTokenizer Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBradfabActorTemplateAnnotationTokenizerBuilderFactory);

        return $this;
    }
}
