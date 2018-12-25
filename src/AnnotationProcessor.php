<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

class AnnotationProcessor implements AnnotationProcessorInterface
{
    use AnnotationProcessor\Context\AwareTrait {
        getAnnotationProcessorContext as public;
    }

    protected $annotation_contents;

    public function getReplacement(): string
    {
        return rtrim($this->getAnnotationContents());
    }

    protected function getAnnotationContents(): string
    {
        if ($this->annotation_contents === null) {
            throw new \LogicException('AnnotationProcessor annotation_contents has not been set.');
        }

        return $this->annotation_contents;
    }

    public function setAnnotationContents(string $annotation_contents): AnnotationProcessorInterface
    {
        if ($this->annotation_contents !== null) {
            throw new \LogicException('AnnotationProcessor annotation_contents is already set.');
        }

        $this->annotation_contents = $annotation_contents;

        return $this;
    }
}
