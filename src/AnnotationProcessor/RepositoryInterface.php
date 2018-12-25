<?php
declare(strict_types=1);

namespace Rhift\Bradfab\AnnotationProcessor;

use Rhift\Bradfab\AnnotationProcessorInterface;

interface RepositoryInterface
{
    public function getByFQCN(string $fqcn): AnnotationProcessorInterface;
}
