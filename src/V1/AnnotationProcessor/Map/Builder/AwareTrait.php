<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\AnnotationProcessor\Map\Builder;

use LogicException;
use Neighborhoods\Buphalo\V1\AnnotationProcessor\Map\BuilderInterface;

trait AwareTrait
{
    protected $AnnotationProcessorMapBuilder;

    public function setAnnotationProcessorMapBuilder(BuilderInterface $AnnotationProcessorMapBuilder): self
    {
        if ($this->hasAnnotationProcessorMapBuilder()) {
            throw new LogicException('AnnotationProcessorMapBuilder is already set.');
        }
        $this->AnnotationProcessorMapBuilder = $AnnotationProcessorMapBuilder;

        return $this;
    }

    protected function getAnnotationProcessorMapBuilder(): BuilderInterface
    {
        if (!$this->hasAnnotationProcessorMapBuilder()) {
            throw new LogicException('AnnotationProcessorMapBuilder is not set.');
        }

        return $this->AnnotationProcessorMapBuilder;
    }

    protected function hasAnnotationProcessorMapBuilder(): bool
    {
        return isset($this->AnnotationProcessorMapBuilder);
    }

    protected function unsetAnnotationProcessorMapBuilder(): self
    {
        if (!$this->hasAnnotationProcessorMapBuilder()) {
            throw new LogicException('AnnotationProcessorMapBuilder is not set.');
        }
        unset($this->AnnotationProcessorMapBuilder);

        return $this;
    }
}
