<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1;

use Neighborhoods\Buphalo\V1\AnnotationProcessor\ContextInterface;

interface AnnotationProcessorInterface
{
    public function setAnnotationProcessorContext(ContextInterface $Context);

    public function getAnnotationProcessorContext(): ContextInterface;

    public function getReplacement(): string;
}
