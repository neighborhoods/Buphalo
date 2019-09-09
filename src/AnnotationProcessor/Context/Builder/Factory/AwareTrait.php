<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\AnnotationProcessor\Context\Builder\Factory;

use LogicException;
use Neighborhoods\Bradfab\AnnotationProcessor\Context\Builder\FactoryInterface;

trait AwareTrait
{
    protected $AnnotationProcessorContextBuilderFactory;

    public function setAnnotationProcessorContextBuilderFactory(FactoryInterface $ContextBuilderFactory): self
    {
        if ($this->hasAnnotationProcessorContextBuilderFactory()) {
            throw new LogicException('AnnotationProcessorContextBuilderFactory is already set.');
        }
        $this->AnnotationProcessorContextBuilderFactory = $ContextBuilderFactory;

        return $this;
    }

    protected function getAnnotationProcessorContextBuilderFactory(): FactoryInterface
    {
        if (!$this->hasAnnotationProcessorContextBuilderFactory()) {
            throw new LogicException('AnnotationProcessorContextBuilderFactory is not set.');
        }

        return $this->AnnotationProcessorContextBuilderFactory;
    }

    protected function hasAnnotationProcessorContextBuilderFactory(): bool
    {
        return isset($this->AnnotationProcessorContextBuilderFactory);
    }

    protected function unsetAnnotationProcessorContextBuilderFactory(): self
    {
        if (!$this->hasAnnotationProcessorContextBuilderFactory()) {
            throw new LogicException('AnnotationProcessorContextBuilderFactory is not set.');
        }
        unset($this->AnnotationProcessorContextBuilderFactory);

        return $this;
    }
}
