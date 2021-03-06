<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\AnnotationProcessor\Map\Builder\Factory;

use LogicException;
use Neighborhoods\Buphalo\V1\AnnotationProcessor\Map\Builder\FactoryInterface;

trait AwareTrait
{
    protected $AnnotationProcessorMapBuilderFactory;

    public function setAnnotationProcessorMapBuilderFactory(FactoryInterface $AnnotationProcessorMapBuilderFactory): self
    {
        if ($this->hasAnnotationProcessorMapBuilderFactory()) {
            throw new LogicException('AnnotationProcessorMapBuilderFactory is already set.');
        }
        $this->AnnotationProcessorMapBuilderFactory = $AnnotationProcessorMapBuilderFactory;

        return $this;
    }

    protected function getAnnotationProcessorMapBuilderFactory(): FactoryInterface
    {
        if (!$this->hasAnnotationProcessorMapBuilderFactory()) {
            throw new LogicException('AnnotationProcessorMapBuilderFactory is not set.');
        }

        return $this->AnnotationProcessorMapBuilderFactory;
    }

    protected function hasAnnotationProcessorMapBuilderFactory(): bool
    {
        return isset($this->AnnotationProcessorMapBuilderFactory);
    }

    protected function unsetAnnotationProcessorMapBuilderFactory(): self
    {
        if (!$this->hasAnnotationProcessorMapBuilderFactory()) {
            throw new LogicException('AnnotationProcessorMapBuilderFactory is not set.');
        }
        unset($this->AnnotationProcessorMapBuilderFactory);

        return $this;
    }
}
