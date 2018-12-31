<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\TargetActor\Template\AnnotationTokenizer\Factory;

use Neighborhoods\Bradfab\TargetActor\Template\AnnotationTokenizer\FactoryInterface;

trait AwareTrait
{
    protected $TargetActorTemplateAnnotationTokenizerFactory;

    public function setTargetActorTemplateAnnotationTokenizerFactory(FactoryInterface $AnnotationTokenizerFactory): self
    {
        if ($this->hasTargetActorTemplateAnnotationTokenizerFactory()) {
            throw new \LogicException('TargetActorTemplateAnnotationTokenizerFactory is already set.');
        }
        $this->TargetActorTemplateAnnotationTokenizerFactory = $AnnotationTokenizerFactory;

        return $this;
    }

    protected function getTargetActorTemplateAnnotationTokenizerFactory(): FactoryInterface
    {
        if (!$this->hasTargetActorTemplateAnnotationTokenizerFactory()) {
            throw new \LogicException('TargetActorTemplateAnnotationTokenizerFactory is not set.');
        }

        return $this->TargetActorTemplateAnnotationTokenizerFactory;
    }

    protected function hasTargetActorTemplateAnnotationTokenizerFactory(): bool
    {
        return isset($this->TargetActorTemplateAnnotationTokenizerFactory);
    }

    protected function unsetTargetActorTemplateAnnotationTokenizerFactory(): self
    {
        if (!$this->hasTargetActorTemplateAnnotationTokenizerFactory()) {
            throw new \LogicException('TargetActorTemplateAnnotationTokenizerFactory is not set.');
        }
        unset($this->TargetActorTemplateAnnotationTokenizerFactory);

        return $this;
    }
}
