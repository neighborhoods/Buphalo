<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\AnnotationProcessor\Context;

use Neighborhoods\Bradfab\AnnotationProcessor\ContextInterface;

interface BuilderInterface
{
    public const STATIC_CONTEXT_RECORD = 'static_context_record';

    public function build(): ContextInterface;

    public function setRecord(array $record): BuilderInterface;
}
