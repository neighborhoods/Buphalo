<?php
declare(strict_types=1);

namespace Rhift\Bradfab;

use Rhift\Bradfab\AnnotationProcessor\ContextInterface;

interface AnnotationProcessorInterface
{
    public function setAnnotationProcessorContext(ContextInterface $Context);

    public function getAnnotationProcessorContext(): ContextInterface;

    public function getReplacement(): string;

    public function setAnnotationContents(string $annotation_contents): AnnotationProcessorInterface;
}
