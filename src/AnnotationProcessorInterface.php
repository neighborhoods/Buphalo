<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo;

use Neighborhoods\Buphalo\AnnotationProcessor\ContextInterface;

interface AnnotationProcessorInterface
{
    public function setAnnotationProcessorContext(ContextInterface $Context);

    public function getAnnotationProcessorContext(): ContextInterface;

    public function getReplacement(): string;
}
