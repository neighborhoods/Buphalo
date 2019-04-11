<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\Actor\Template\AnnotationTokenizer;

use LogicException;
use Neighborhoods\Bradfab\Actor\Template\AnnotationTokenizerInterface;

trait AwareTrait
{
    protected $TargetActorTemplateAnnotationTokenizer;

    public function setTargetActorTemplateAnnotationTokenizer(AnnotationTokenizerInterface $AnnotationTokenizer): self
    {
        if ($this->hasTargetActorTemplateAnnotationTokenizer()) {
            throw new LogicException('TargetActorTemplateAnnotationTokenizer is already set.');
        }
        $this->TargetActorTemplateAnnotationTokenizer = $AnnotationTokenizer;

        return $this;
    }

    protected function getTargetActorTemplateAnnotationTokenizer(): AnnotationTokenizerInterface
    {
        if (!$this->hasTargetActorTemplateAnnotationTokenizer()) {
            throw new LogicException('TargetActorTemplateAnnotationTokenizer is not set.');
        }

        return $this->TargetActorTemplateAnnotationTokenizer;
    }

    protected function hasTargetActorTemplateAnnotationTokenizer(): bool
    {
        return isset($this->TargetActorTemplateAnnotationTokenizer);
    }

    protected function unsetTargetActorTemplateAnnotationTokenizer(): self
    {
        if (!$this->hasTargetActorTemplateAnnotationTokenizer()) {
            throw new LogicException('TargetActorTemplateAnnotationTokenizer is not set.');
        }
        unset($this->TargetActorTemplateAnnotationTokenizer);

        return $this;
    }
}
