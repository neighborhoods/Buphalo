<?php
declare(strict_types=1);

namespace Rhift\Bradfab\SupportingActor\Template\AnnotationTokenizer;

use Rhift\Bradfab\SupportingActor\Template\AnnotationTokenizerInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateAnnotationTokenizer;

    public function setSupportingActorTemplateAnnotationTokenizer(AnnotationTokenizerInterface $AnnotationTokenizer): self
    {
        if ($this->hasSupportingActorTemplateAnnotationTokenizer()) {
            throw new \LogicException('SupportingActorTemplateAnnotationTokenizer is already set.');
        }
        $this->SupportingActorTemplateAnnotationTokenizer = $AnnotationTokenizer;

        return $this;
    }

    protected function getSupportingActorTemplateAnnotationTokenizer(): AnnotationTokenizerInterface
    {
        if (!$this->hasSupportingActorTemplateAnnotationTokenizer()) {
            throw new \LogicException('SupportingActorTemplateAnnotationTokenizer is not set.');
        }

        return $this->SupportingActorTemplateAnnotationTokenizer;
    }

    protected function hasSupportingActorTemplateAnnotationTokenizer(): bool
    {
        return isset($this->SupportingActorTemplateAnnotationTokenizer);
    }

    protected function unsetSupportingActorTemplateAnnotationTokenizer(): self
    {
        if (!$this->hasSupportingActorTemplateAnnotationTokenizer()) {
            throw new \LogicException('SupportingActorTemplateAnnotationTokenizer is not set.');
        }
        unset($this->SupportingActorTemplateAnnotationTokenizer);

        return $this;
    }
}
