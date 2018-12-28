<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\SupportingActor\Template\AnnotationTokenizer\Factory;

use Neighborhoods\Bradfab\SupportingActor\Template\AnnotationTokenizer\FactoryInterface;

trait AwareTrait
{
    protected $SupportingActorTemplateAnnotationTokenizerFactory;

    public function setSupportingActorTemplateAnnotationTokenizerFactory(FactoryInterface $AnnotationTokenizerFactory): self
    {
        if ($this->hasSupportingActorTemplateAnnotationTokenizerFactory()) {
            throw new \LogicException('SupportingActorTemplateAnnotationTokenizerFactory is already set.');
        }
        $this->SupportingActorTemplateAnnotationTokenizerFactory = $AnnotationTokenizerFactory;

        return $this;
    }

    protected function getSupportingActorTemplateAnnotationTokenizerFactory(): FactoryInterface
    {
        if (!$this->hasSupportingActorTemplateAnnotationTokenizerFactory()) {
            throw new \LogicException('SupportingActorTemplateAnnotationTokenizerFactory is not set.');
        }

        return $this->SupportingActorTemplateAnnotationTokenizerFactory;
    }

    protected function hasSupportingActorTemplateAnnotationTokenizerFactory(): bool
    {
        return isset($this->SupportingActorTemplateAnnotationTokenizerFactory);
    }

    protected function unsetSupportingActorTemplateAnnotationTokenizerFactory(): self
    {
        if (!$this->hasSupportingActorTemplateAnnotationTokenizerFactory()) {
            throw new \LogicException('SupportingActorTemplateAnnotationTokenizerFactory is not set.');
        }
        unset($this->SupportingActorTemplateAnnotationTokenizerFactory);

        return $this;
    }
}
