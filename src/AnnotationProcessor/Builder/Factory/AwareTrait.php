<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor\Builder\Factory;

use LogicException;
use Neighborhoods\Buphalo\AnnotationProcessor\Builder\FactoryInterface;

trait AwareTrait
{
    protected $AnnotationProcessorBuilderFactory;

    public function setAnnotationProcessorBuilderFactory(FactoryInterface $AnnotationProcessorBuilderFactory): self
    {
        if ($this->hasAnnotationProcessorBuilderFactory()) {
            throw new LogicException('AnnotationProcessorBuilderFactory is already set.');
        }
        $this->AnnotationProcessorBuilderFactory = $AnnotationProcessorBuilderFactory;

        return $this;
    }

    protected function getAnnotationProcessorBuilderFactory(): FactoryInterface
    {
        if (!$this->hasAnnotationProcessorBuilderFactory()) {
            throw new LogicException('AnnotationProcessorBuilderFactory is not set.');
        }

        return $this->AnnotationProcessorBuilderFactory;
    }

    protected function hasAnnotationProcessorBuilderFactory(): bool
    {
        return isset($this->AnnotationProcessorBuilderFactory);
    }

    protected function unsetAnnotationProcessorBuilderFactory(): self
    {
        if (!$this->hasAnnotationProcessorBuilderFactory()) {
            throw new LogicException('AnnotationProcessorBuilderFactory is not set.');
        }
        unset($this->AnnotationProcessorBuilderFactory);

        return $this;
    }
}
