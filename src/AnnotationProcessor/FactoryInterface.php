<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor;

use Neighborhoods\Buphalo\AnnotationProcessorInterface;

interface FactoryInterface
{
    public function create(): AnnotationProcessorInterface;
}
