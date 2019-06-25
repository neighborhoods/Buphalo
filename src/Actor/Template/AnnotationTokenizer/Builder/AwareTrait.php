<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\AnnotationTokenizer\Builder;

use LogicException;
use Neighborhoods\Bradfab\Actor\Template\AnnotationTokenizer\BuilderInterface;

/** @codeCoverageIgnore */
trait AwareTrait
{
    protected $NeighborhoodsBradfabActorTemplateAnnotationTokenizerBuilder;

    public function setActorTemplateAnnotationTokenizerBuilder(BuilderInterface $actorTemplateAnnotationTokenizerBuilder
    ): self {
        if ($this->hasActorTemplateAnnotationTokenizerBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template AnnotationTokenizer Builder is already set.');
        }
        $this->NeighborhoodsBradfabActorTemplateAnnotationTokenizerBuilder = $actorTemplateAnnotationTokenizerBuilder;

        return $this;
    }

    protected function getActorTemplateAnnotationTokenizerBuilder(): BuilderInterface
    {
        if (!$this->hasActorTemplateAnnotationTokenizerBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template AnnotationTokenizer Builder is not set.');
        }

        return $this->NeighborhoodsBradfabActorTemplateAnnotationTokenizerBuilder;
    }

    protected function hasActorTemplateAnnotationTokenizerBuilder(): bool
    {
        return isset($this->NeighborhoodsBradfabActorTemplateAnnotationTokenizerBuilder);
    }

    protected function unsetActorTemplateAnnotationTokenizerBuilder(): self
    {
        if (!$this->hasActorTemplateAnnotationTokenizerBuilder()) {
            throw new LogicException('Neighborhoods Bradfab Actor Template AnnotationTokenizer Builder is not set.');
        }
        unset($this->NeighborhoodsBradfabActorTemplateAnnotationTokenizerBuilder);

        return $this;
    }
}
