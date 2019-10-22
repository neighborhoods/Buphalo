<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V1\AnnotationProcessor;

use Neighborhoods\Buphalo\V1\AnnotationProcessorInterface;

interface FactoryInterface
{
    public function create(): AnnotationProcessorInterface;
}
