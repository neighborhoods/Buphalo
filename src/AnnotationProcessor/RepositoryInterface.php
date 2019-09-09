<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\AnnotationProcessor;

use Neighborhoods\Buphalo\AnnotationProcessorInterface;

interface RepositoryInterface
{
    public function getByFQCN(string $annotationProcessorFQCN): AnnotationProcessorInterface;
}
