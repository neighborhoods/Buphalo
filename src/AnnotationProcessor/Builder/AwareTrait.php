<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\AnnotationProcessor\Builder;

use LogicException;
use Neighborhoods\Bradfab\AnnotationProcessor\BuilderInterface;

trait AwareTrait
{
    protected $AnnotationProcessorBuilder;

    public function setAnnotationProcessorBuilder(BuilderInterface $AnnotationProcessorBuilder): self
    {
        if ($this->hasAnnotationProcessorBuilder()) {
            throw new LogicException('AnnotationProcessorBuilder is already set.');
        }
        $this->AnnotationProcessorBuilder = $AnnotationProcessorBuilder;

        return $this;
    }

    protected function getAnnotationProcessorBuilder(): BuilderInterface
    {
        if (!$this->hasAnnotationProcessorBuilder()) {
            throw new LogicException('AnnotationProcessorBuilder is not set.');
        }

        return $this->AnnotationProcessorBuilder;
    }

    protected function hasAnnotationProcessorBuilder(): bool
    {
        return isset($this->AnnotationProcessorBuilder);
    }

    protected function unsetAnnotationProcessorBuilder(): self
    {
        if (!$this->hasAnnotationProcessorBuilder()) {
            throw new LogicException('AnnotationProcessorBuilder is not set.');
        }
        unset($this->AnnotationProcessorBuilder);

        return $this;
    }
}
