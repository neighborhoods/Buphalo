<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\AnnotationProcessor;

use Neighborhoods\Buphalo\V2\AnnotationProcessorInterface;

interface FactoryInterface
{
    public function create(): AnnotationProcessorInterface;
}
