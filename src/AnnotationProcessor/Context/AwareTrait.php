<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor\Context;

use LogicException;
use Neighborhoods\Buphalo\AnnotationProcessor\ContextInterface;

trait AwareTrait
{
    protected $AnnotationProcessorContext;

    public function setAnnotationProcessorContext(ContextInterface $Context): self
    {
        if ($this->hasAnnotationProcessorContext()) {
            throw new LogicException('AnnotationProcessorContext is already set.');
        }
        $this->AnnotationProcessorContext = $Context;

        return $this;
    }

    protected function getAnnotationProcessorContext(): ContextInterface
    {
        if (!$this->hasAnnotationProcessorContext()) {
            throw new LogicException('AnnotationProcessorContext is not set.');
        }

        return $this->AnnotationProcessorContext;
    }

    protected function hasAnnotationProcessorContext(): bool
    {
        return isset($this->AnnotationProcessorContext);
    }

    protected function unsetAnnotationProcessorContext(): self
    {
        if (!$this->hasAnnotationProcessorContext()) {
            throw new LogicException('AnnotationProcessorContext is not set.');
        }
        unset($this->AnnotationProcessorContext);

        return $this;
    }
}
