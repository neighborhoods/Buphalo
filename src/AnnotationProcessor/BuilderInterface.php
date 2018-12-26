<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor;

use Rhift\Bradfab\AnnotationProcessorInterface;

interface BuilderInterface
{
    public const PROCESSOR_FQCN = 'processor_fqcn';

    public function build(): AnnotationProcessorInterface;

    public function setRecord(array $record): BuilderInterface;
}
