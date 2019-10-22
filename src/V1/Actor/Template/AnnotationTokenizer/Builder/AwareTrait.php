<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\Actor\Template\AnnotationTokenizer\Builder;

use LogicException;
use Neighborhoods\Buphalo\V1\Actor\Template\AnnotationTokenizer\BuilderInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBuphaloActorTemplateAnnotationTokenizerBuilder;

    public function setActorTemplateAnnotationTokenizerBuilder(BuilderInterface $actorTemplateAnnotationTokenizerBuilder
    ): self {
        if ($this->hasActorTemplateAnnotationTokenizerBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template AnnotationTokenizer Builder is already set.');
        }
        $this->NeighborhoodsBuphaloActorTemplateAnnotationTokenizerBuilder = $actorTemplateAnnotationTokenizerBuilder;

        return $this;
    }

    protected function getActorTemplateAnnotationTokenizerBuilder(): BuilderInterface
    {
        if (!$this->hasActorTemplateAnnotationTokenizerBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template AnnotationTokenizer Builder is not set.');
        }

        return $this->NeighborhoodsBuphaloActorTemplateAnnotationTokenizerBuilder;
    }

    protected function hasActorTemplateAnnotationTokenizerBuilder(): bool
    {
        return isset($this->NeighborhoodsBuphaloActorTemplateAnnotationTokenizerBuilder);
    }

    protected function unsetActorTemplateAnnotationTokenizerBuilder(): self
    {
        if (!$this->hasActorTemplateAnnotationTokenizerBuilder()) {
            throw new LogicException('Neighborhoods Buphalo Actor Template AnnotationTokenizer Builder is not set.');
        }
        unset($this->NeighborhoodsBuphaloActorTemplateAnnotationTokenizerBuilder);

        return $this;
    }
}
