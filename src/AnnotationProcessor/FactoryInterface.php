<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor;

use Rhift\Bradfab\AnnotationProcessorInterface;

interface FactoryInterface
{
    public function create(): AnnotationProcessorInterface;
}
