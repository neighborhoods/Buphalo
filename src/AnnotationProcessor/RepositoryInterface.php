<?php
declare(strict_types=1);

namespace Neighborhoods\Bradfab\AnnotationProcessor;

use Neighborhoods\Bradfab\AnnotationProcessorInterface;

interface RepositoryInterface
{
    public function getByFQCN(string $annotationProcessorFQCN): AnnotationProcessorInterface;
}
