<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor\Map\Factory;

use Rhift\Bradfab\AnnotationProcessor\Map\FactoryInterface;

trait AwareTrait
{
    protected $AnnotationProcessorMapFactory;

    public function setAnnotationProcessorMapFactory(FactoryInterface $AnnotationProcessorMapFactory): self
    {
        if ($this->hasAnnotationProcessorMapFactory()) {
            throw new \LogicException('AnnotationProcessorMapFactory is already set.');
        }
        $this->AnnotationProcessorMapFactory = $AnnotationProcessorMapFactory;

        return $this;
    }

    protected function getAnnotationProcessorMapFactory(): FactoryInterface
    {
        if (!$this->hasAnnotationProcessorMapFactory()) {
            throw new \LogicException('AnnotationProcessorMapFactory is not set.');
        }

        return $this->AnnotationProcessorMapFactory;
    }

    protected function hasAnnotationProcessorMapFactory(): bool
    {
        return isset($this->AnnotationProcessorMapFactory);
    }

    protected function unsetAnnotationProcessorMapFactory(): self
    {
        if (!$this->hasAnnotationProcessorMapFactory()) {
            throw new \LogicException('AnnotationProcessorMapFactory is not set.');
        }
        unset($this->AnnotationProcessorMapFactory);

        return $this;
    }
}
