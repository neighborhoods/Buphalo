<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor\Context\Builder;

use LogicException;
use Neighborhoods\Buphalo\AnnotationProcessor\Context\BuilderInterface;

trait AwareTrait
{
    protected $AnnotationProcessorContextBuilder;

    public function setAnnotationProcessorContextBuilder(BuilderInterface $ContextBuilder): self
    {
        if ($this->hasAnnotationProcessorContextBuilder()) {
            throw new LogicException('AnnotationProcessorContextBuilder is already set.');
        }
        $this->AnnotationProcessorContextBuilder = $ContextBuilder;

        return $this;
    }

    protected function getAnnotationProcessorContextBuilder(): BuilderInterface
    {
        if (!$this->hasAnnotationProcessorContextBuilder()) {
            throw new LogicException('AnnotationProcessorContextBuilder is not set.');
        }

        return $this->AnnotationProcessorContextBuilder;
    }

    protected function hasAnnotationProcessorContextBuilder(): bool
    {
        return isset($this->AnnotationProcessorContextBuilder);
    }

    protected function unsetAnnotationProcessorContextBuilder(): self
    {
        if (!$this->hasAnnotationProcessorContextBuilder()) {
            throw new LogicException('AnnotationProcessorContextBuilder is not set.');
        }
        unset($this->AnnotationProcessorContextBuilder);

        return $this;
    }
}
