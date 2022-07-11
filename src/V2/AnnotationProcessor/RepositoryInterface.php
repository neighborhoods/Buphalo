<?php
declare(strict_types=1);

namespace Neighborhoods\Buphalo\V2\AnnotationProcessor;

use Neighborhoods\Buphalo\V2\AnnotationProcessorInterface;

interface RepositoryInterface
{
    public function getByFQCN(string $annotationProcessorFQCN): AnnotationProcessorInterface;
}
