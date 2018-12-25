<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor\Context\Factory;

use Rhift\Bradfab\AnnotationProcessor\Context\FactoryInterface;

trait AwareTrait
{
    protected $AnnotationProcessorContextFactory;

    public function setAnnotationProcessorContextFactory(FactoryInterface $ContextFactory): self
    {
        if ($this->hasAnnotationProcessorContextFactory()) {
            throw new \LogicException('AnnotationProcessorContextFactory is already set.');
        }
        $this->AnnotationProcessorContextFactory = $ContextFactory;

        return $this;
    }

    protected function getAnnotationProcessorContextFactory(): FactoryInterface
    {
        if (!$this->hasAnnotationProcessorContextFactory()) {
            throw new \LogicException('AnnotationProcessorContextFactory is not set.');
        }

        return $this->AnnotationProcessorContextFactory;
    }

    protected function hasAnnotationProcessorContextFactory(): bool
    {
        return isset($this->AnnotationProcessorContextFactory);
    }

    protected function unsetAnnotationProcessorContextFactory(): self
    {
        if (!$this->hasAnnotationProcessorContextFactory()) {
            throw new \LogicException('AnnotationProcessorContextFactory is not set.');
        }
        unset($this->AnnotationProcessorContextFactory);

        return $this;
    }
}
