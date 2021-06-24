<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template\AnnotationTokenizer\Builder\Factory;

use LogicException;
use Neighborhoods\Buphalo\V2\Actor\Template\AnnotationTokenizer\Builder\FactoryInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBuphaloActorTemplateAnnotationTokenizerBuilderFactory;

    public function setActorTemplateAnnotationTokenizerBuilderFactory(
        FactoryInterface $actorTemplateAnnotationTokenizerBuilderFactory
    ): self {
        if ($this->hasActorTemplateAnnotationTokenizerBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template AnnotationTokenizer Builder Factory is already set.');
        }
        $this->NeighborhoodsBuphaloActorTemplateAnnotationTokenizerBuilderFactory = $actorTemplateAnnotationTokenizerBuilderFactory;

        return $this;
    }

    protected function getActorTemplateAnnotationTokenizerBuilderFactory(): FactoryInterface
    {
        if (!$this->hasActorTemplateAnnotationTokenizerBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template AnnotationTokenizer Builder Factory is not set.');
        }

        return $this->NeighborhoodsBuphaloActorTemplateAnnotationTokenizerBuilderFactory;
    }

    protected function hasActorTemplateAnnotationTokenizerBuilderFactory(): bool
    {
        return isset($this->NeighborhoodsBuphaloActorTemplateAnnotationTokenizerBuilderFactory);
    }

    protected function unsetActorTemplateAnnotationTokenizerBuilderFactory(): self
    {
        if (!$this->hasActorTemplateAnnotationTokenizerBuilderFactory()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template AnnotationTokenizer Builder Factory is not set.');
        }
        unset($this->NeighborhoodsBuphaloActorTemplateAnnotationTokenizerBuilderFactory);

        return $this;
    }
}
