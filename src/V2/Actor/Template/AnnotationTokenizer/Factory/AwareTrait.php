<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\Actor\Template\AnnotationTokenizer\Factory;

use LogicException;
use Neighborhoods\Buphalo\V2\Actor\Template\AnnotationTokenizer\FactoryInterface;

trait AwareTrait
{
    protected $ActorTemplateAnnotationTokenizerFactory;

    public function setActorTemplateAnnotationTokenizerFactory(FactoryInterface $AnnotationTokenizerFactory): self
    {
        if ($this->hasActorTemplateAnnotationTokenizerFactory()) {
            throw new LogicException('ActorTemplateAnnotationTokenizerFactory is already set.');
        }
        $this->ActorTemplateAnnotationTokenizerFactory = $AnnotationTokenizerFactory;

        return $this;
    }

    protected function getActorTemplateAnnotationTokenizerFactory(): FactoryInterface
    {
        if (!$this->hasActorTemplateAnnotationTokenizerFactory()) {
            throw new LogicException('ActorTemplateAnnotationTokenizerFactory is not set.');
        }

        return $this->ActorTemplateAnnotationTokenizerFactory;
    }

    protected function hasActorTemplateAnnotationTokenizerFactory(): bool
    {
        return isset($this->ActorTemplateAnnotationTokenizerFactory);
    }

    protected function unsetActorTemplateAnnotationTokenizerFactory(): self
    {
        if (!$this->hasActorTemplateAnnotationTokenizerFactory()) {
            throw new LogicException('ActorTemplateAnnotationTokenizerFactory is not set.');
        }
        unset($this->ActorTemplateAnnotationTokenizerFactory);

        return $this;
    }
}
