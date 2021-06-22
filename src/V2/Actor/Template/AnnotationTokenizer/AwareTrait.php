<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template\AnnotationTokenizer;

use LogicException;
use Neighborhoods\Buphalo\V2\Actor\Template\AnnotationTokenizerInterface;

trait AwareTrait
{
    protected $ActorTemplateAnnotationTokenizer;

    public function setActorTemplateAnnotationTokenizer(AnnotationTokenizerInterface $AnnotationTokenizer): self
    {
        if ($this->hasActorTemplateAnnotationTokenizer()) {
            throw new LogicException('ActorTemplateAnnotationTokenizer is already set.');
        }
        $this->ActorTemplateAnnotationTokenizer = $AnnotationTokenizer;

        return $this;
    }

    protected function getActorTemplateAnnotationTokenizer(): AnnotationTokenizerInterface
    {
        if (!$this->hasActorTemplateAnnotationTokenizer()) {
            throw new LogicException('ActorTemplateAnnotationTokenizer is not set.');
        }

        return $this->ActorTemplateAnnotationTokenizer;
    }

    protected function hasActorTemplateAnnotationTokenizer(): bool
    {
        return isset($this->ActorTemplateAnnotationTokenizer);
    }

    protected function unsetActorTemplateAnnotationTokenizer(): self
    {
        if (!$this->hasActorTemplateAnnotationTokenizer()) {
            throw new LogicException('ActorTemplateAnnotationTokenizer is not set.');
        }
        unset($this->ActorTemplateAnnotationTokenizer);

        return $this;
    }
}
